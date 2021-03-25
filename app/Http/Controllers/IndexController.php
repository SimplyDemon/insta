<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class IndexController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $contacts = Contact::orderBy( 'id', 'asc' )->get();

        return view( 'index', [
            'contacts' => $contacts,
        ] );
    }
}
