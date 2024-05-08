@extends('layouts.template')

@section('title', 'Data User')

@section('content')
<div class="row">
    
    
        <div class="card card-dander">
            <div class="card-header">
                {{ $errors->any() }}

                <h4 class="card-title">Data</h4>
                <div class="card-tools">
                    <a href="{{ route('user.create') }}" class="btn btn-tool btn-sm"><i class="fas fa-plus"></i>
                        &nbsp;ADD NEW</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dtMember" class="tbData table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtMember as $rsMember)
                            <tr>
                                <td>{{ $rsMember->name }}</td>
                                <td>{{ $rsMember->email }}</td>
                                <td class="text-center">
                                    <span class="badge bg-{{ $rsMember->status == 1 ? 'success' : 'danger' }}">
                                        {{ $rsMember->status == 1 ? 'Aktif' : 'Non Aktif' }}
                                    </span>
                                </td>
                                <td>
                                    <form onsubmit="return confirm('Yakin mau menghapus ini ? ')"
                                        action="{{ route('user.destroy', $rsMember->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('user.edit', $rsMember->id) }}"><i
                                                class="fas fa-user-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</div>
@endsection

