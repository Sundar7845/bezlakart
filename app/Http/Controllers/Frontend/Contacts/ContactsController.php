<?php

namespace App\Http\Controllers\Frontend\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function contactUs(){

        return view('frontend.contacts_us.contactus');
    }
}
