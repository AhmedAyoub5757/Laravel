<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(){
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function show($id){
        $member = Member::find($id);

        if(!$member){
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }

        $memberType = $member->membership_type;
        return view('members.show', compact('member', 'memberType'));
    }

    public function store(){
        $memberNumber = Member::count() + 1;

        $member = Member::create([
            'name' => 'Riaz ' . $memberNumber,
            'email' => 'riaz-' . Str::uuid() . '@example.com',
            'membership_type' => 'Basic',
            'membership_fee' => 40.00,
            'is_active' => true
        ]);

        return redirect()->route('members.show', $member->id)
            ->with('success', 'Member created successfully.');
    }

    public function update($id){
        $member = Member::find($id);
        
        if(!$member){
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }

        $member->update([
            'membership_type' => 'Premium',
            'membership_fee' => 200.00,
        ]);

        return redirect()->route('members.show', $member->id)
            ->with('success', 'Member updated!');
    }

    public function deactivate($id){
        $member = Member::find($id);
        
        if(!$member){
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }

        $member->update([
            'is_active' => false,
        ]);

        return redirect()->route('members.show', $member->id)
            ->with('success', 'Member deactivated!');
    }

    public function delete($id){
        $member = Member::find($id);
        
        if(!$member){
            return redirect()->route('members.index')->with('error', 'Member not found.');
        }

        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted!');
    }
}
