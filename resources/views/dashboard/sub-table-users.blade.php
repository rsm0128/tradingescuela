    <select id="payment" style="margin-bottom:30px">
        <option selected>Selecciona una opción</option>
        <option value="{{ route('sub-manage-user') }}">Todos</option>
        <option value="{{ route('sub-manage-user-paid') }}">Pagado</option>
        <option value="{{ route('sub-manage-user-not-paid') }}">Sin Pagar</option>
    </select>
   
    <input id="search_input" style="position:inline-block;margin-bottom:30px" type="text" placeholder="Buscar por email..." name="search">
    <button id="search-btn"><i class="fa fa-search"></i></button>
    
    
    <div id="table-div" class="table-responsive"> 
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                    <th>ID#</th>
                    <th>Editar</th>
                    <th>Detalles</th>
                    <th>Plan</th>
                    <th>Días con plan restantes</th>
                    <th>Estatus de pago</th>
                    <th>Fecha del último pago</th>
                    <th>Tipo de pago</th>
                    <th>Fecha de registro</th>
                    <th>Verificación de email</th>
                    <th>Verificación de teléfono</th>
                    <th>Estatus</th>
                    <th>Acción</th>
                </tr>
            </thead>
        
            <tbody>
            @foreach($user as $k => $p)
                <tr class="{{ $p->plan_status == 1 ? '' : 'bg-warning ' }}">
                    <td>{{ $p->id }}</td>
                    <td><a href="{{ route('sub-user-edit',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Edit"><i class="fa fa-edit"></i> Editar</a></td>
                    <td>{{$p->name}}<br>{{$p->email}}<br>{{$p->country_code}}{{$p->phone}}</td>
                    <td>{{$p->plan->name}}</td>
                    <td>
                        @if($p->expire_time==1)
                            <div>Duración Ilimitada</div>
                        @else
                            @if($p->plan_status == 1)
                                <div> {{ \Carbon\Carbon::parse($p->expire_time)->diffInDays()  }} días</div>
                            @else
                                <div> 0 días</div>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($p->plan_status == 1)
                            <div class="badge badge-success"><i class="fa fa-check"></i> Pagado</div>
                        @else
                            <div class="badge badge-danger"><i class="fa fa-times"></i> Sin Pagar</div>
                        @endif
                    </td>
                    <td>
                        @if($p->last_payment == null)
                            <div>Plan gratuito o sin info. de pago</div>
                        @else
                            <div>{{ $p->last_payment }}</div>
                        @endif
                    </td>
                    <td>{{ $p->payment_type }}</td>
                    <td>{{ $p->created_at }}</td>
                    <td>
                        @if($p->email_status == 1)
                            <button type="button" class="btn btn-primary btn-sm bold uppercase email_button"
                                    data-toggle="modal" data-target="#EmailModal"
                                    data-id="{{$p->id}}" title="Unverified">
                                <i class='fa fa-check'></i> Verificado
                            </button>
                        @else
                            <button type="button" class="btn btn-danger btn-sm bold uppercase email_button"
                                    data-toggle="modal" data-target="#EmailModal"
                                    data-id="{{$p->id}}" title="Verified">
                                <i class='fa fa-times'></i> Sin verificar
                            </button>
                        @endif
                    </td>
                    <td>
                        @if($p->phone_status == 1)
                            <button type="button" class="btn btn-primary btn-sm bold uppercase phone_button"
                                    data-toggle="modal" data-target="#PhoneModal"
                                    data-id="{{$p->id}}" title="Unverified">
                                <i class='fa fa-check'></i> Verificado
                            </button>
                        @else
                            <button type="button" class="btn btn-danger btn-sm bold uppercase phone_button"
                                    data-toggle="modal" data-target="#PhoneModal"
                                    data-id="{{$p->id}}" title="Verified">
                                <i class='fa fa-times'></i> Sin verificar
                            </button>
                        @endif
                    </td>
                    <td>
                        @if($p->status == 0)
                            <button type="button" class="btn btn-primary btn-sm bold uppercase block_button"
                                    data-toggle="modal" data-target="#DelModal"
                                    data-id="{{$p->id}}" title="Block">
                                <i class='fa fa-check'></i> Activo
                            </button>
                        @else
                            <button type="button" class="btn btn-danger btn-sm bold uppercase block_button"
                                    data-toggle="modal" data-target="#DelModal"
                                    data-id="{{$p->id}}" title="Active">
                                <i class='fa fa-times'></i> Bloqueado
                            </button>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm bold uppercase confirm_button"
                                data-toggle="modal" data-target="#ConModal"
                                data-id="{{$p->id}}" title="Delete">
                            <i class='fa fa-trash'></i> Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$user->links('basic.pagination')}}