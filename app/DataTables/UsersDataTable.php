<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'users.datatables.action')
            ->editColumn(
                'avatar',
                function ($user) {
                    if (!empty($user->avatar)) {
                        $imageUrl = url("storage/avatars/{$user->avatar}");

                        return '<img src="' . $imageUrl . '" border="0" width="40" class="img-rounded" />';
                    } else {
                        return '<img src="#" border="0" width="40" class="img-rounded" />';
                    }
                }
            )
            ->rawColumns(['row_number', 'action', 'avatar']);
    }

    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->removeColumn('id')
            ->minifiedAjax()
            ->orderBy(0, 'asc')
            ->addAction(['width' => '80px'])
            ->buttons([
                Button::make('add'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('row_number')
                ->title('#')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->width(50)
                ->orderable(false)
                ->searchable(false),
            Column::make('name'),
            Column::make('email'),
            Column::make('avatar')->orderable(false)->searchable(false)->width(100),
        ];
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
