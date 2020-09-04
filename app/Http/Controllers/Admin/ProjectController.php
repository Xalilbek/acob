<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lang;
use App\Project;
use App\ProjectDescription;
use App\ProjectImage;
use App\ProjectSketch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('type', 0)->orderBy('order')->get();
        return view('admin.pages.projects', ['projects' => $projects]);
    }

    public function addOrEditProject($id)
    {
        if ($id > 0) {
            $project = Project::find($id);
        } else {
            $project = new Project();
            $max_order = Project::where('type', 0)->max('order');
            $project->order = $max_order + 1;
        }
        $langs = Lang::all();
        return view('admin.pages.project', ['project' => $project, 'langs' => $langs, 'id' => $id]);
    }

    public function saveProject(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required',
            'title' => 'required|string|unique:projects,title,' . $request->get('id') . ',id',
            'image' => 'nullable|file|image|max:10000',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            DB::beginTransaction();
            try {
                if ($request->get('id') > 0) {
                    $project = Project::with(['projectImages', 'projectSketches', 'projectDescriptions'])->find($request->get('id'));
                    if ($project->image && $request->filled('image')) {
                        @unlink(public_path('assets/images/projects/') . $project->image);
                        @unlink(public_path('assets/images/projects/resizes/') . $project->image);
                    }
                } else {
                    $project = new Project();
                    $max_order = Project::where('type', 0)->max('order');
                    $project->order = $max_order + 1;
                }

                $project->title = $request->get('title');
                $project->slug = Str::slug($request->get('title'));
                $project->total_area = $request->get('total_area');
                $project->used_area = $request->get('used_area');
                $project->room_count = $request->get('room_count');
                $project->cash = $request->get('cash');
                $project->price = $request->get('price');
                $project->payment_time = $request->get('payment_time');
                $project->first_payment = $request->get('first_payment');
                $project->monthly_payment = $request->get('monthly_payment');
                $project->monthly_payment = $request->get('monthly_payment');


                $project->lang_id = $request->get('lang', 1);

                if ($request->file('image')) {
                    $imageName = time() . '_pf' . '.' . $request->file('image')->getClientOriginalExtension();

//                    $img = Image::make($request->file('image'));
//                    $img->resize(350, null, function ($constraint) {
//                        $constraint->aspectRatio();
//                    });
                    //                $img->resize(350, 239);
//                    $img->save(public_path('assets/images/projects/resizes/') . $imageName);

                    request()->file('image')->move(public_path('assets/images/projects'), $imageName);

                    $project->image = $imageName;
                }

                //            $palette = Palette::fromFilename(public_path() . '/assets/images/projects/', $imageName);
                //            $color = "#ffffff";
                //            foreach ($palette as $color => $count) {
                //                $color = Color::fromIntToHex($color);
                //            }
                //            $project->color = $color;

                $project->save();

                $project->projectDescriptions()->delete();
                if ($request->has('description')) {
                    foreach ($request->get('description') as $desc) {
                        $descObj = new ProjectDescription();
                        $descObj->name = $desc['name'];
                        $descObj->value = $desc['value'];
                        $descObj->project_id = $project->id;
                        $descObj->save();
                    }
                }

                if ($request->has('project_images')) {
                    foreach (request('project_images') as $key => $file) {
                        $imageName = time() . '_pi_' . ++$key . '.' . $file->getClientOriginalExtension();

//                        $img = Image::make($file);
//                        $img->resize(350, null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        });
                        //                $img->resize(350, 239);
//                        $img->save(public_path('assets/images/projects/resizes/') . $imageName);

                        $file->move(public_path('assets/images/projects'), $imageName);
                        $projectImage = new ProjectImage();
                        $projectImage->project_id = $project->id;
                        $projectImage->image = $imageName;
                        $projectImage->order = ProjectImage::where('project_id',$project->id)->max('order') + 1 ;
                        $projectImage->save();
                    }
                }

//                if ($request->has('project_sketches')) {
//                    foreach (request('project_sketches') as $key => $file) {
//                        $imageName = time() . '_ps_' . ++$key . '.' . $file->getClientOriginalExtension();
//
//                        $img = Image::make($file);
//                        $img->resize(350, null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        });
//    //                $img->resize(350, 239);
//                        $img->save(public_path('assets/images/projects/resizes/') . $imageName);
//
//                        $file->move(public_path('assets/images/projects') , $imageName);
//                        $projectImage = new ProjectSketch();
//                        $projectImage->project_id = $project->id;
//                        $projectImage->image = $imageName;
//                        $projectImage->save();
//                    }
//                }
                DB::commit();
                return response()->json(['status' => true]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json(['status' => false, 'errors' => $th->getMessage()]);
            }

        }
    }

    public function deleteProject($id)
    {
        $project = Project::with(['projectImages', 'projectSketches', 'projectDescriptions'])->find($id);
        if ($project) {
            $this->deleteProjectImages($project);
            $project->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function deleteProjectImages($project)
    {
        foreach ($project->projectImages as $images) {
            @unlink(public_path('assets/images/projects/') . $images->image);
            @unlink(public_path('assets/images/projects/resizes/') . $images->image);
        }
        foreach ($project->projectSketches as $images) {
            @unlink(public_path('assets/images/projects/') . $images->image);
            @unlink(public_path('assets/images/projects/resizes/') . $images->image);
        }
        foreach ($project->projectDescriptions as $images) {
            @unlink(public_path('assets/images/projects/') . $images->image);
            @unlink(public_path('assets/images/projects/resizes/') . $images->image);
        }
        @unlink(public_path('assets/images/projects/') . $project->image);
        @unlink(public_path('assets/images/projects/resizes/') . $project->image);
    }


    public function indexPrepared()
    {
        $projects = Project::where('type', 1)->orderBy('order')->get();
        return view('admin.pages.prepared_projects', ['projects' => $projects]);
    }

    public function addOrEditProjectPrepared($id)
    {
        if ($id > 0) {
            $project = Project::with(['projectImages', 'projectSketches', 'projectDescriptions'])->find($id);
        } else {
            $project = new Project();
            $max_order = Project::where('type', 1)->max('order');
            $project->order = $max_order + 1;
        }
        $langs = Lang::all();
        return view('admin.pages.prepared_project', ['project' => $project, 'langs' => $langs, 'id' => $id]);
    }

    public function saveProjectPrepared(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required',
            'title' => 'required|string|unique:projects,title,' . $request->get('id') . ',id'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            DB::beginTransaction();
            try {
                if ($request->get('id') > 0) {
                    $project = Project::with(['projectImages', 'projectSketches', 'projectDescriptions'])->find($request->get('id'));
                    if ($project->image && $request->filled('image')) {
                        @unlink(public_path('assets/images/projects/') . $project->image);
                        @unlink(public_path('assets/images/projects/resizes/') . $project->image);
                    }
                } else {
                    $project = new Project();
                    $max_order = Project::where('type', 1)->max('order');
                    $project->order = $max_order + 1;
                }

                $project->title = $request->get('title');
                $project->slug = Str::slug($request->get('title'));
                $project->total_area = $request->get('total_area');
                $project->used_area = $request->get('used_area');
                $project->room_count = $request->get('room_count');
                $project->cash = $request->get('cash');
                $project->price = $request->get('price');
                $project->payment_time = $request->get('payment_time');
                $project->first_payment = $request->get('first_payment');
                $project->monthly_payment = $request->get('monthly_payment');
                $project->type = 1;
                $project->prepared_type = $request->get('prepared_type');
                $project->lang_id = $request->get('lang', 1);

                if ($request->file('image')) {
                    $imageName = time() . '_pf' . '.' . $request->file('image')->getClientOriginalExtension();

//                    $img = Image::make($request->file('image'));
//                    $img->resize(350, null, function ($constraint) {
//                        $constraint->aspectRatio();
//                    });
//                    //                $img->resize(350, 239);
//                    $img->save(public_path('assets/images/projects/resizes/') . $imageName);

                    request()->file('image')->move(public_path('assets/images/projects'), $imageName);
                    $project->image = $imageName;
                }

                $project->save();

                $project->projectDescriptions()->delete();
                if ($request->has('description')) {
                    foreach ($request->get('description') as $desc) {
                        $descObj = new ProjectDescription();
                        $descObj->name = $desc['name'];
                        $descObj->value = $desc['value'];
                        $descObj->project_id = $project->id;
                        $descObj->save();
                    }
                }

                if ($request->has('project_images')) {
                    foreach (request('project_images') as $key => $file) {
                        $imageName = time() . '_pi_' . ++$key . '.' . $file->getClientOriginalExtension();

//                        $img = Image::make($file);
//                        $img->resize(350, null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        });
//                        //                $img->resize(350, 239);
//                        $img->save(public_path('assets/images/projects/resizes/') . $imageName);

                        $file->move(public_path('assets/images/projects'), $imageName);
                        $projectImage = new ProjectImage();
                        $projectImage->project_id = $project->id;
                        $projectImage->image = $imageName;
                        $projectImage->order = ProjectImage::where('project_id',$project->id)->max('order') + 1 ;
                        $projectImage->save();
                    }
                }

                if ($request->has('project_sketches')) {
                    foreach (request('project_sketches') as $key => $file) {
                        $imageName = time() . '_ps_' . ++$key . '.' . $file->getClientOriginalExtension();

//                        $img = Image::make($file);
//                        $img->resize(350, null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        });
//                        //                $img->resize(350, 239);
//                        $img->save(public_path('assets/images/projects/resizes/') . $imageName);

                        $file->move(public_path('assets/images/projects'), $imageName);
                        $projectImage = new ProjectSketch();
                        $projectImage->project_id = $project->id;
                        $projectImage->image = $imageName;
                        $projectImage->save();
                    }
                }
                DB::commit();
                return response()->json(['status' => true]);

            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json(['status' => false, 'errors' => $th->getMessage()]);
            }
        }
    }

    public function deleteProjectPrepared($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();
            @unlink(public_path() . '/assets/images/projects/' . $project->image);
            @unlink(public_path() . '/assets/images/projects/resizes/' . $project->image);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function changeOrder()
    {
        $ids = request('ids');
        $i = 0;
        foreach ($ids as $id) {
            $i ++;
            Project::where('id',$id)->update(['order'=>$i]);
        }
        return response(['status' => true]);
    }

    public function changeOrderPrepare()
    {
        $ids = request('ids');
        $i = 0;
        foreach ($ids as $id) {
            $i ++;
            Project::where('id',$id)->update(['order'=>$i]);
        }
        return response(['status' => true]);
    }
    public function changeOrderImage()
    {
        $ids = request('ids');
        $i = 0;
        foreach ($ids as $id) {
            $i ++;
            ProjectImage::where('id',$id)->update(['order'=>$i]);
        }
        return response(['status' => true]);
    }

    public function deleteProjectImage($id)
    {
        $project = ProjectImage::find($id);
        if ($project) {
            $project->delete();
            @unlink(public_path() . '/assets/images/projects/' . $project->image);
            @unlink(public_path() . '/assets/images/projects/resizes/' . $project->image);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
