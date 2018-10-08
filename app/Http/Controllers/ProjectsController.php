<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DB;
use Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo __METHOD__;

        //$articles = DB::select("SELECT * FROM `projects`");die;
        //$articles = DB::table('projects')->get();
        //$articles = DB::table('projects')->first();
        //$articles = DB::table('projects')->value('name');
        //$articles = DB::table('projects')->pluck('name');
        //$articles = DB::table('projects')->count();
        //$articles = DB::table('projects')->max('id');
        //$articles = DB::table('projects')->select('id', 'name', 'image')->get();
        //$articles = DB::table('projects')->distinct()->select('name', 'image')->get();
        //$articles = DB::table('projects')->distinct()->select('name', 'image')->get();
        /*$articles = DB::table('projects')
            ->whereBetween('id', [1,3])
            ->orderByDesc('id')
            ->get();*/
        //$articles = DB::table('projects')->where('id', 3)->update(['name'=>'Hi']);
        //$articles = DB::table('projects')->where('id', 3)->delete();


        //var_dump($articles);

        //$projects = Project::all();
        //$projects = Project::where('id', '>', 3)->orderBy('name')->take(2)->get();
        //$projects = Project::where('id', 16)->firstOrFail();
        //$projects = Project::findOrFail(100);
        /*$projects = Project::find(16);
        $projects->name = 'New name';
        $projects->code = 'New code';

        $projects->save();*/

        /*$projects - Project::firstOrCreate([

            'name' => 'Hi',
            'code' => 'hihi'

        ]);*/

        /*$projects - Project::firstOrNew([

            'name' => 'Hi',
            'code' => 'hihi'

        ]);

        $projects->save();*/

        /*$project = Project::find(16);

        $project->delete();*/

        //Project::destroy(22);

        //Project::where('id', '>', 3)->delete();

        $projects = Project::all();
        $projects[1]->capitalizeNameFirstLetter();

        dd($projects[1]->save());


        $data = [
            'projects' => DB::table('projects')->get(['id','name','code','image','active'])
        ];

        return view('projects.projects', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Storage::disk('local')->put('file.txt', 'Contents');
        if($request->hasFile('image')){
            $request->file('image');
            $image = $request->image->path();
            $request->image->storeAs('public', $image);
        }else{
            $image = '';
        }

        DB::table('projects')->insert
            ([
                'name' => $request->name,
                'code' => $request->code,
                'image' => $image,
                'description' => '',
                'active' => 1,
                'view_count' => 10
            ]);
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'user' => DB::table('projects')->find($id)
        ];

        return view('projects.user', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'project' => DB::table('projects')->where('id', $id)->first(['id','name','code','image','active'])
        ];

        return view('projects.edit-user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image')){
            $request->file('image');
            $image = $request->image->path();
            $request->image->storeAs('public', $image);
        }else{
            $image = $request->old_image;
        }


        DB::table('projects')->where('id', $id)->update
        ([
            'name' => $request->name,
            'code' => $request->code,
            'image' => $image
        ]);
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('projects')->delete($id);
        return redirect()->route('projects.index');
    }
}
