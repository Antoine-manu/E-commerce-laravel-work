@extends('layouts.app')

@section('template_title')
    Products
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Produits
                            </span>

                             <div class="float-right">
                                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nouveau produit
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nom</th>
									<th >Description</th>
									<th >Prix</th>
									<th >Image</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $product->name }}</td>
										<td >{{ $product->description }}</td>
										<td >{{ $product->price }}</td>
										<td >{{ $product->image }}</td>

                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('products.show', $product->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-fw fa-edit"></i> Editer</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Voulez-vous le supprimer ?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
