<?php

namespace App\Repository\Record;

use App\Models\ItemsRecords;
use App\Models\Records;
use App\Repository\InterfaceBasicRepository;
use Illuminate\Support\Facades\DB;
use EloquentBuilder;

class RecordsRepository implements InterfaceBasicRepository
{
    /**
     * Create the Singleton Pattern
     *
     * @return object
     */
    private static $_instance = null;

    private function __construct()
    {
        // Avoid constructing this class on the outside.
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getAll()
    {
        $data = Records::orderBy('id', 'desc')->paginate(20);
        return $data;
    }

    public function getSpecify($request)
    {
        $data = Records::where('id', '=', $request->id)->get();
        return $data;
    }

    public function getFilter($request) {
        $data = EloquentBuilder::to(Records::class, request()->all())->orderBy('id', 'desc')->paginate(20);
        return $data;
    }

    public function getAmount($request) {
        $data = EloquentBuilder::to(Records::class, request()->all())->count();
        return $data;
    }

    public function insert($request)
    {
        $data = DB::transaction(function () use ($request) {
            $record = Records::create($request->all());
            foreach ($request->items_records as $item) {
                $item['record_id'] = $record->id;
                ItemsRecords::create($item);
            }
            $record = $this->getSpecify($record);
            return $record;
        });
        return $data;
    }

    public function update($request)
    {
        $data = DB::transaction(function () use ($request) {
            $recordUpdateObject = $request->all();
            unset($recordUpdateObject['items_records']);
            $record = Records::where('id', $request->id)->update($recordUpdateObject);
            foreach ($request->items_records as $item) {
                ItemsRecords::where('id', $item['id'])->update($item);
            }
            $record = $this->getSpecify($request);
            return $record;
        });
        return $data;
    }

    public function delete($request)
    {
        $data = DB::transaction(function () use ($request) {
            ItemsRecords::where('record_id', '=', $request->id)->delete();
            $data = Records::where('id', '=', $request->id)->delete();
            return $data;
        });
        return $data;
    }
}
