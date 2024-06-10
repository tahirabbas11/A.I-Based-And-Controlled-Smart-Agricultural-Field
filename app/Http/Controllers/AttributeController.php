<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;

use App\Models\{
        Attribute,
        AttributeValue
    };

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{

    public function removeColumns($columns, $columsToBeRemove)
    {
        foreach ($columsToBeRemove as $value) {
            if (($key = array_search($value, $columns)) !== false) {
                unset($columns[$key]);
            }
        }
        return $columns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = new Attribute();

        if ($search != null) {
            $query = Attribute::query();

            $table = $data->getTable();

            $columns = $this->removeColumns(Schema::getColumnListing($table), ['created_at', 'updated_at', 'image', 'id']);

            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
            }
            $data = $query->orderBy('name')->paginate(12);

            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        } else {
            $data = $data->paginate(12);
            if ($request->onChange == true) {
                return response()->json(['status' => true, 'data' => $data, 'lastPage' => $data->lastPage()]);
            }
        }


        return view('attribute.attribute.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $data = null;
        return view('attribute.attribute.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:attributes',
            'status' => 'required|boolean',
            'value' => 'required|array|min:1'
        ]);
        $request->request->remove('_token', 'value');
        $data = $request->except('value');
        $attribute = Attribute::create($data);

        $attrValues = [];
        foreach ($request->value as $value) {
            array_push($attrValues, new AttributeValue(['name' => $value]));
        }

        $attribute->attrValues()->saveMany($attrValues);
        return redirect('admin/attribute/attribute')->with('success', 'Attribute added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $data = Attribute::findOrFail($id);

        return view('attribute.attribute.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->request->remove('_token');
        $request->request->remove('_method');
        $data = $request->input();
        $attribute->update($data);
        $attrValues = [];

        foreach ($request->value as $value) {
            array_push($attrValues, new AttributeValue(['name' => $value]));
        }

        $attribute->attrValues()->saveMany($attrValues);
        return redirect()->back()->with('success', 'Attribute Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Attribute $attribute)
    {

        $status = $attribute->status;
        if ($status == 0) {
            $attribute->status = 1;
            $message = 'Deactive';
        } else {
            $attribute->status = 0;
            $message = 'Active';
        }
        $attribute->save();

        return redirect()->back()->with('success', 'Attribute ' . $message);
    }

    public function deleteAttrValue(Request $request){
        AttributeValue::destroy($request->id);

        return response()->json(['status'=>true,'message'=>'This value is deleted successfuly.']);
    }
}
