<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

require  public_path('../app/dompdf/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class AdminController extends Controller
{
    public function showPage()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('admin/login');
        }
        return view('admin.dashboard');
    }
    public function login(Request $req)
    {
        // return $request->all();
        if (DB::table('users')->where('email', $req->email)->where('is_admin', true)->count('id')) {
            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials, $req->input('remember', false))) {
                // Authentication passed...
                return redirect()->intended('admin/dashboard');
            }
        }
        return redirect()->back()->withInput($req->only('email', 'remember'))->withErrors(['err' => 'Invalid credentials']);
    }
    public function getMapPage()
    {
        $maps = DB::table('maps')->get();

        return view('admin.maps', ['maps' => $maps]);
    }
    public function createMap()
    {
        $map = null;
        if (request()->has('id')) {
            $map = DB::table('maps')->where('id', request()->id)->first();
        }
        return view('admin.createMap', ['map' => $map]);
    }
    public function postMap(Request $req)
    {
        // dd($req->all());
        if ($req->id) {
            $map = Maps::find($req->id);
        } else {
            $map = new Maps();
        }

        $map->title = $req->title;
        $map->src = $req->url;
        $map->save();
        return redirect()->route('maps.view', $map->id);
    }

    public function viewMap(Maps $id)
    {
        // return $id;

        return view('admin.viewMap', ['map' => $id]);
    }
    public function export()
    {
        // dd("data");
        ob_clean();

        if (isset($_GET['title'])) {
            $title = $_GET['title'];
            $title_arg = "&title=" . urlencode($title);
        } else {
            $title = "PDF";
            $title_arg = "";
        }

        // $img = base64_encode(file_get_contents(__DIR__ . "/img.png"));
        $map = DB::table('maps')->where('id', $_GET['id'])->first();
        $html = "<!DOCTYPE html>
<html>
<head>
<style>
body {
    display: block;
    margin: 10px;
    width: 90%;
    
}
p {
    white-space: pre-wrap;
}
</style>
</head>
<body>
<h1>$title</h1>
<iframe src='$map->src' frameborder='0' width='100%'></iframe>
<p> couldn't load map </p>
<p>Map Url: $map->src </p>
";

    

        $html .= "</body>";
        $html .= "</html>";

        if (isset($_GET['pdf'])) {
            $filename = $title . " pdf.pdf";

            $options = new Options();
            $options->setIsRemoteEnabled(true);

            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A5', 'portrait');

            // lets us know if something goes wrong
            global $_dompdf_show_warnings;
            $_dompdf_show_warnings = true;

            // render the HTML as PDF
            $dompdf->render();

            // output the generated PDF to browser
            
            $dompdf->stream($filename, array('Attachment' => 0));
            exit;
        } else {
            echo $html;
        }
    }
}
