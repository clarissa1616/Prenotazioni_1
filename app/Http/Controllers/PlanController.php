<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    public function create() {
        return view('admin.plan.create');
    }

    public function store(Request $request) {
        Plan::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        return redirect()->back();
    }

    public function index() {
        $plans = Plan::all();
        return view('admin.plans', compact('plans'));
    }

    public function show(Plan $plan) {
        return view('admin.plan.show', compact('plan'));
    }

    public function edit(Plan $plan) {
        return view('admin.plan.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan) {
        $plan->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        $plan->save();
        return redirect()->back();
    }

    public function destroy(Plan $plan) {
        $plan->delete();
        return redirect()->route('plan.index');
    }
}
