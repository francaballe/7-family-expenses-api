<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;


 class ExpensesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');//->except(['show']);
    }

    //All Expenses
    public function index()
    {
        $expenses = Expense::with('user')->get();

        $data = $expenses->map(function ($expense) {
            return [
                'id' => $expense->id,
                'user_id' => $expense->user_id,
                'user_name' => $expense->user->name . " " . $expense->user->last_name,
                'expense_date' => $expense->expense_date,
                'due_date' => $expense->due_date,
                'description' => $expense->description,
                'amount' => $expense->amount,
                'comment' => $expense->comment,
                'proof_url' => $expense->proof_url                
            ];
        });

        return response()->json($data, 200);
    }

    //Only 1 expense matching the provided Id
    public function show($id)
    {
        $expense = Expense::with('user')->find($id);

        if (!$expense) {
            return response()->json(['message' => 'Expense not found!'], 404);
        }

        $data = [
            'id' => $expense->id,
            'user' => $expense->user->name . " " . $expense->user->last_name,
            'expense_date' => $expense->expense_date,
            'due_date' => $expense->due_date,
            'description' => $expense->description,
            'amount' => $expense->amount,
            'comment' => $expense->comment,
            'proof_url' => $expense->proof_url                
        ];

        return response()->json($data, 200);
    }

    //New expense
    public function store(Request $request)
    {
        $request->validate([
            'expense_date' => 'required|date',
            'due_date' => 'nullable|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'comment' => 'nullable|string',
            'proof_url' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $expense = Expense::create($request->all());

        return response()->json(['message' => 'New Expense created successfully'], 201);
    }

    //Modify expense (ID should be provided)
    public function update(Request $request, $id)
    {
        $request->validate([
            'expense_date' => 'required|date',
            'due_date' => 'nullable|date',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'comment' => 'nullable|string',
            'proof_url' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return response()->json(['message' => 'Expense updated successfully'], 200);
    }

    //Delete expense
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return response()->json(['message' => 'Expense successfully deleted'], 200);
    }


}