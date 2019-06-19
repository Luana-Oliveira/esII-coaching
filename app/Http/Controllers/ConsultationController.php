<?php
namespace App\Http\Controllers;
use App\Model\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Auth::user()
            ->consultations()
            ->get();
        return view('consultation.index',compact(
            'consultations'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultation = new Consultation();
        return view('consultation.form',compact(
            'consultation'
        ));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultation = Auth::user()
            ->consultations()
            ->create([
                'date'=> "{$request->input('date')} {$request->input('hour')}:00",
                'location'=>$request->input('location'),
                'comments'=>$request->input("comments")
            ]);
        return redirect()->route('consultations.show',[
            'id'=>$consultation->id
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultation = Auth::user()
            ->consultations()
            ->findOrFail($id);
        return view('consultation.show',compact(
            'consultation'
        ));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultation = Auth::user()
            ->consultations()
            ->findOrFail($id);
        return view('consultation.form',compact(
            'consultation'
        ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consultation = Auth::user()
            ->consultations()
            ->findOrFail($id)
            ->update([
                'date'=> "{$request->input('date')} {$request->input('hour')}:00",
                'location'=>$request->input('location'),
                'comments'=>$request->input("comments")
            ]);
        return redirect()
            ->route('consultations.show',[
            'id'=>$id
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Auth::user()
            ->consultations()
            ->findOrFail($id)
            ->delete();
        return redirect()->route('consultations.index');
    }
}