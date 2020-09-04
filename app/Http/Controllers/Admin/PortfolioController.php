<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lang;
use App\Portfolio;
use App\PortfolioImage;
use App\Project;
use App\ProjectImage;
use App\ProjectSketch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.pages.portfolios', ['portfolios' => $portfolios]);
    }

    public function addOrEditProject($id)
    {
        if ($id > 0) {
            $portfolio = Portfolio::find($id);
        } else {
            $portfolio = new Portfolio();
        }
        $langs = Lang::all();
        return view('admin.pages.portfolio', ['portfolio' => $portfolio, 'langs' => $langs, 'id' => $id]);
    }

    public function saveProject(Request $request)
    {
        $validator = validator($request->all(), [
            'id' => 'required',
            'title' => 'required|string|unique:portfolios,title,' . $request->get('id') . ',id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        } else {
            if ($request->get('id') > 0) {
                $portfolio = Portfolio::find($request->get('id'));
            } else {
                $portfolio = new Portfolio();
            }

            $portfolio->title = $request->get('title');
            $portfolio->slug = Str::slug($request->get('title'));
            $portfolio->lang_id = $request->get('lang',1);

            $portfolio->save();

            if ($request->has('portfolio_images')) {
                foreach (request('portfolio_images') as $key => $file) {
                    $imageName = time() . '_pi_'. ++$key . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path() . '/assets/images/projects/', $imageName);
                    $projectImage = new PortfolioImage();
                    $projectImage->portfolio_id = $portfolio->id;
                    $projectImage->image = $imageName;
                    $projectImage->save();
                }
            }

            return response()->json(['status' => true]);

        }
    }

    public function deleteProject($id)
    {
        $project = Portfolio::find($id);

        if ($project) {
            $project->delete();
            @unlink(public_path() . '/assets/images/projects/' . $project->image);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
