<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Expression;
use App\Models\Client;
use App\Models\Project;
use DB;

class WebController extends Controller
{
    public function main_page_light()
    {
        $projects = Project::join('clients', 'projects.fid_client', '=', 'clients.id_client')
                    ->select('projects.*', 'clients.name AS cname', 'clients.photo AS cphoto')
                    ->where('projects.is_active','Y')
                    ->orderBy('projects.created_at', 'desc')
                    ->limit(4)
                    ->get();
        $clients = Client::where('is_active','Y')->orderBy('id_client', 'desc')->get();
        $total_sudah = Project::where('projects.is_done','Y')->get()->count();
        $total_client = Client::get()->count();
        $total_project = Project::get()->count();
        $persentase = ($total_sudah / $total_project ) * 100;
        return view('web.page.main',compact('clients','projects','total_project','persentase','total_client'));
    }
    public function main_page_dark()
    {
        $projects = Project::join('clients', 'projects.fid_client', '=', 'clients.id_client')
                    ->select('projects.*', 'clients.name AS cname', 'clients.photo AS cphoto')
                    ->where('projects.is_active','Y')
                    ->orderBy('projects.created_at', 'desc')
                    ->limit(4)
                    ->get();
        $clients = Client::where('is_active','Y')->orderBy('id_client', 'desc')->get();
        $total_sudah = Project::where('projects.is_done','Y')->get()->count();
        $total_client = Client::get()->count();
        $total_project = Project::get()->count();
        $persentase = ($total_sudah / $total_project ) * 100;
        return view('web.page.main',compact('clients','projects','total_project','persentase','total_client'));
    }
}
