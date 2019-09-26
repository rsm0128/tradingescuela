
   
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
                </tr>
            </thead>
        
            <tbody>
            @foreach($user as $k => $p)
                <tr class="{{ $p->plan_status == 1 ? '' : 'bg-warning ' }}">
                    <td>{{ $p->id }}</td>
                    <td><a href="{{ route('subscriber-user-edit',$p->id) }}" class="btn btn-primary btn-sm bold uppercase" title="Detalles"><i class="fa fa-edit"></i> Detalles</a></td>
                    <td>{{$p->name}}<br>{{$p->email}}<br>{{$p->country_code}}{{$p->phone}}</td>
                    <td>{{$p->plan->name}}</td>
                    <td>
                        @if($p->expire_time==1)
                            <div>Duración Ilimitada</div>
                        @else
                            <!--<div> {{ \Carbon\Carbon::parse($p->expire_time)->diffInDays()  }} días</div>-->
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$user->links('basic.pagination')}}