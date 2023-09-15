<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Contact;
use App\Models\ContactCategory;
use App\Models\History;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function view()
    {
        //
    }

    public function create()
    {
        $branches = Branch::all();
        $categories = ContactCategory::all();
        return view('contact.create', compact('categories', 'branches'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'code' => 'nullable|unique:contacts,code',
            'phone' => 'required|min:1300000000|max:1999999999|numeric'
        ],[
            'code.unique' => 'Contact Code Must Be Unique.',
            'phone.min' => 'Invalid Phone Number',
            'phone.max' => 'Invalid Phone Number',
        ]);

        DB::beginTransaction();
        try
        {
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = (int)$request->phone;
            $contact->phone_1 = $request->phone_1;
            $contact->email = $request->email;
            $contact->status = Auth::user()->role_id == 1 ? 'active' : 'inactive';
            $contact->branch_id = $request->branch_id ?? null;
            $contact->category_id = $request->category_id;
            $contact->address = $request->address;
            $contact->details = $request->details;
            $contact->code = $request->code;
            $contact->company = $request->company;
            $contact->created_by = Auth::user()->id;
            $contact->created_at = Carbon::now()->toDateTimeString();
            $contact->updated_by = Auth::user()->id;
            $contact->updated_at = Carbon::now()->toDateTimeString();
            $contact->save();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "contact_" . $contact->id . "." . $file_extention;
                $success                    = $file->move('assets/images/contacts', $new_file_name);

                if ($success) {
                    $contact->image      = 'contacts/' . $new_file_name;
                }
            }

            if ($request->hasFile('files')) {
                foreach($request->file('files') as $key => $file)
                {
                    $fileName = rand(100,999).'_'.$contact->id.'_'.$file->getClientOriginalName();
                    $file->move(public_path('assets/files/contacts'), $fileName);
                    $files[] = 'contacts/' . $fileName;
                }
                $contact->files = json_encode($files);
            }

            $contact->save();

            $history = new History();
            $history->module = "Contact";
            $history->module_id = $contact->id;
            $history->operation = "Create";
            $history->previous = null;
            $history->after = json_encode($contact);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('contact')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Contact Created Successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('contact')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Contact Creation!!!'.$e);
        }
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        $branches = Branch::all();
        $categories = ContactCategory::all();
        return view('contact.edit', compact('categories', 'branches', 'contact'));
    }

    public function update(Request $request)
    {
        dd($request->all());
        // CONTACT EDIT NOT STARTED YET. JUST COPIED FROM CONTACT CREATE NEED TO WORK FOR UPDATE
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'phone' => 'required|min:1300000000|max:1999999999|numeric'
        ],[
            'phone.min' => 'Invalid Phone Number',
            'phone.max' => 'Invalid Phone Number',
        ]);

        DB::beginTransaction();
        try
        {
            $contact = Contact::find($request->id);
            $contact->name = $request->name;
            $contact->phone = (int)$request->phone;
            $contact->phone_1 = $request->phone_1;
            $contact->email = $request->email;
            $contact->status = Auth::user()->role_id == 1 ? 'active' : 'inactive';
            $contact->branch_id = $request->branch_id ?? null;
            $contact->category_id = $request->category_id;
            $contact->address = $request->address;
            $contact->details = $request->details;
            $contact->company = $request->company;
            $contact->updated_by = Auth::user()->id;
            $contact->updated_at = Carbon::now()->toDateTimeString();
            $contact->save();

            if ($request->hasFile('image')) {
                $file                       = $request->file('image');
                $file_extention             = $file->getClientOriginalExtension();
                $new_file_name              = "contact_" . $contact->id . "." . $file_extention;
                $success                    = $file->move('assets/images/contacts', $new_file_name);

                if ($success) {
                    $contact->image      = 'contacts/' . $new_file_name;
                }
            }

            if ($request->hasFile('files')) {
                foreach($request->file('files') as $key => $file)
                {
                    $fileName = rand(100,999).'_'.$contact->id.'_'.$file->getClientOriginalName();
                    $file->move(public_path('assets/files/contacts'), $fileName);
                    $files[] = 'contacts/' . $fileName;
                }
                $contact->files = json_encode($files);
            }

            $contact->save();

            $history = new History();
            $history->module = "Contact";
            $history->module_id = $contact->id;
            $history->operation = "Edit";
            $history->previous = null;
            $history->after = json_encode($contact);
            $history->user_id = Auth::user()->id;
            $history->ip_address = Session::get('user_ip');
            $history->save();
            DB::commit();

            return redirect()
            ->route('contact')
            ->with('alert.status', 'success')
            ->with('alert.message', 'Contact Edited Successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()
            ->route('user')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Error in Contact Creation!!!');
        }
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        // CHECK CONDITIONS BEFORE DELETE

        $history = new History();
        $history->module = "Contact";
        $history->module_id = $contact->id;
        $history->operation = "Delete";
        $history->after = null;
        $history->previous = json_encode($contact);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        $contact->delete();

        return redirect()
        ->route('contact')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Deleted Successfully!');
    }

    public function categoryIndex()
    {
        $categories = ContactCategory::all();
        return view('contact.category.index', compact('categories'));
    }

    public function categoryView()
    {
        //
    }

    public function categoryCreate()
    {
        $categories = ContactCategory::all();
        return view('contact.category.create', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $category = new ContactCategory();
        $category->name = $request->category_name;
        $category->parent_category_id = $request->parent_category;
        $category->details = $request->category_details;
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->created_at = Carbon::now()->toDateTimeString();
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->save();

        $history = new History();
        $history->module = "Contact Category";
        $history->module_id = $category->id;
        $history->operation = "Create";
        $history->previous = null;
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('contact_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryEdit($id)
    {
        $category = ContactCategory::find($id);
        $categories = ContactCategory::all();
        return view('contact.category.edit', compact('categories', 'category'));
    }

    public function categoryUpdate(Request $request)
    {
        $category = ContactCategory::find($request->id);
        $old_category = clone $category;

        $category->name = $request->category_name;
        $category->parent_category_id = $request->parent_category;
        $category->details = $request->category_details;
        $category->updated_by = Auth::user()->id;
        $category->updated_at = Carbon::now()->toDateTimeString();
        $category->save();

        $history = new History();
        $history->module = "Contact Category";
        $history->module_id = $category->id;
        $history->operation = "Edit";
        $history->previous = json_encode($old_category);
        $history->after = json_encode($category);
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        return redirect()
        ->route('contact_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Created Successfully!');
    }

    public function categoryDelete($id)
    {
        $category = ContactCategory::where('parent_category_id', $id)->first();
        if(!empty($category))
        {
            return redirect()
            ->route('contact_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Contact Category Is Used As a Parent Category. It Cannot Be Deleted!');
        }

        $contact = Contact::where('category_id', $id)->first();
        if(!empty($contact))
        {
            return redirect()
            ->route('contact_category')
            ->with('alert.status', 'danger')
            ->with('alert.message', 'Contact Category Is Used as a Category of a Contact. It Cannot Be Deleted!');
        }

        $category = ContactCategory::find($id);

        $history = new History();
        $history->module = "Contact Category";
        $history->module_id = $category->id;
        $history->operation = "Delete";
        $history->previous = json_encode($category);
        $history->after = null;
        $history->user_id = Auth::user()->id;
        $history->ip_address = Session::get('user_ip');
        $history->save();

        $category->delete();

        return redirect()
        ->route('contact_category')
        ->with('alert.status', 'success')
        ->with('alert.message', 'Contact Category Deleted Successfully!');
    }
}
