<?php

namespace App\Http\Controllers;

use App\Chat;
use App\PlayerTotal;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kinnngg\Swat4query\Server as Swat4Server;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        dd('Index');
    }


    /**
     * Query SWAT4 Server and returns JSON Data
     * @return Swat4Server
     */
    public function getServerQuery()
    {
        $data = new Swat4Server('houseofpain.tk',10481);
        $data->query();
        return htmlspecialchars_decode(html_entity_decode($data));
    }

    public function getServerChats()
    {
        $chats = Chat::orderBy('created_at','DESC')->limit(35)->get();
        foreach($chats as $chat)
        {
            print($chat->message)."<br>";
        }
    }

    public function getQueryUser($query)
    {
        return (User::where('username','like','%'.$query.'%')->orWhere('name','like','%'.$query.'%')->orWhere('email','like','%'.$query.'%')->get(['id','name','username']));

    }

    public function getQueryPlayer($query)
    {
        return (PlayerTotal::where('name','like','%'.$query.'%')->get(['id','name','position']));

    }
}
