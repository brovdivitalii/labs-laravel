<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GasStationController extends Controller
{
    public function index()
    {
        $gasStations = GasStation::all();
        return view('gas-stations.index', compact('gasStations'));
    }
    public function create()
    {
        return view('gas-stations.create');
    }
    public function store(Request $request)
    {
        $gasStation = new GasStation();
        $gasStation->code = $request->input('code');
        $gasStation->address = $request->input('address');
        $gasStation->owner_company = $request->input('owner_company');
        $gasStation->fuel_list = $request->input('fuel_list');
        $gasStation->save();
        return redirect()->route('gas-stations.index')->with('success', 'Gas station created successfully.');
    }
    public function show($id)
    {
        $gasStation = GasStation::find($id);
        return view('gas-stations.show', compact('gasStation'));
    }
    public function edit($id)
    {
        $gasStation = GasStation::find($id);
        return view('gas-stations.edit', compact('gasStation'));
    }
    public function update($id, Request $request)
    {
        $azs = GasStation::findOrFail($id); // знаходимо модель за ідентифікатором
        $azs->address = $request->input('address'); // оновлюємо адресу АЗС
        $azs->owner = $request->input('owner'); // оновлюємо фірму-власника
        $azs->fuel_types = $request->input('fuel_types'); // оновлюємо список наявних пальних

        $azs->save(); // зберігаємо зміни в базі даних

        return redirect()->route('azs.index'); // перенаправляємо користувача на сторінку зі списком АЗС
    }
    public function destroy($id)
    {
        $azs = GasStation::findOrFail($id); // знаходимо модель за ідентифікатором
        $azs->delete(); // видаляємо модель з бази даних

        return redirect()->route('azs.index'); // перенаправляємо користувача на сторінку зі списком АЗС
    }
}

