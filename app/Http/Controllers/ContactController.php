<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;


class ContactController extends Controller {

    /**
     * Store a newly created contact submission resource in storage.
     *
     * @param \App\Http\Requests\ContactStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContactStoreRequest $request)
    {
        $validated = $request->validated();

        $contact = Contact::create($validated);

        return $this->success($contact->toArray());
    }
}
