<?php

namespace App\Http\Controllers\Admin;

use App\Design;
use App\DesignImage;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectImage;
use App\ProjectSketch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DesignController extends Controller
{
    public function index()
    {
        $projects = Design::orderBy('order')->get();
        return view('admin.pages.designs', ['designs' => $projects]);
    }

    public function addOrEditProject($id)
    {
        if ($id > 0) {
            $project = Design::find($id);
        } else {
            $project = new Design();
            $max_order = Design::max('order');
            $project->order = $max_order + 1;
        }


        return view('admin.pages.design', ['design' => $project,  'id' => $id]);
    }

    public function saveProject(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required',
            'title' => 'required|string|unique:designs,title,' . $request->get('id') . ',id',
            'design_images' => 'sometimes|array',
            'design_images.*' => 'file|image|max:10000'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            DB::beginTransaction();
            try {
                if ($request->get('id') > 0) {
                    $project = Design::with('images')->find($request->get('id'));
                } else {
                    $project = new Design();
                    $max_order = Design::max('order');
                    $project->order = $max_order + 1;
                }

                $project->title = $request->get('title');
                $project->slug = Str::slug($request->get('title'));

                $project->save();

                if ($request->has('design_images')) {
                    foreach (request('design_images') as $key => $file) {
                        $imageName = time() .'_di_' .++$key. '.' . $file->getClientOriginalExtension();

//                        $img = Image::make($file);
//                        $img->resize(350, null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        });
//    //                $img->resize(350, 239);
//                        $img->save(public_path('/assets/images/projects/resizes/') . $imageName);

                        $file->move(public_path('/assets/images/projects') , $imageName);
                        $projectImage = new DesignImage();
                        $projectImage->design_id = $project->id;
                        $projectImage->image = $imageName;
//                        $projectImage->lang_id = 1;
                        $projectImage->save();
                    }
                }
                DB::commit();
                return response()->json(['status' => true]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json(['status' => false,'message' => $th->getMessage()]);
            }
        }
    }

    public function deleteProject($id)
    {
        $project = Design::with('images')->find($id);

        if ($project) {
            foreach($project->images as $images){
                @unlink(public_path('/assets/images/projects/') . $images->image);
                @unlink(public_path('/assets/images/projects/resizes/') . $images->image);
            }
            $project->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    public function changeOrder(){
        $ids = request('ids');
        $i = 0;
        foreach ($ids as $id) {
            $i ++;
            Design::where('id',$id)->update(['order'=>$i]);
        }
        return response(['status' => true]);
    }
    public function changeOrderImage()
    {
        $ids = request('ids');
        $i = 0;
        foreach ($ids as $id) {
            $i ++;
            DesignImage::where('id',$id)->update(['order'=>$i]);
        }
        return response(['status' => true]);
    }

    public function deleteDesignImage($id)
    {
        $project = DesignImage::find($id);
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
