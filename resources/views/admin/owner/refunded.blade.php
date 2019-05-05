@extends('layouts.admin')

@section('title')
    <title>Refund</title>
@endsection
@section('content')
@section('page_title')
    <h3 class="page-title mbot10">Refund</h3>
@endsection
<div class="col s12">
    @if($refund->count())
        <div class="table-responsive">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                   
                    <th>{{get_string('username')}}</th>
                    <th>Refund_no</th>
                    <th>Booking_no</th>
                    <th>{{get_string('amount')}}</th>
                    <th>Status</th>
                    <th class="icon-options">{{get_string('options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($refund as $refunded)
                    <tr>
                       
                        <td>@if($refunded->user){{ $refunded->user->username }}@endif</td>
                        <td>{{ $refunded->ref_no }}</td>
                        <td>{{ $refunded->booking_id }}</td>
                        <td>{{ $currency }} {{ $refunded->amount }} </td>
                        <td class="request-status">
                         @if($refunded->status == 0) Pending
                         @elseif($refunded->status == 1)Paid

                         @elseif($refunded->status == 2)Pending guest confirmation
                         @endif

                         </td>
                        <td>
                         <div class="icon-options">
                            <a href="#user-modal" data-toggle="modal" class="user-info" data-id="{{$refunded->user_id}}" data-ref="{{$refunded->id}}" title="{{get_string('user_info')}}"><i class="small material-icons color-blue">person</i></a>
                        
                          
                            
                        </div>
                        </td>
                    </tr>
     
                @endforeach
                </tbody>
            </table>
        </div>
        {{$refund->links()}}
                         <div id="user-modal" class="modal not-summernote fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <a href="#!" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></a>
                    <strong class="modal-title">{{get_string('user_info')}}</strong>
                </div>
                <div class="modal-body" id="user-details"></div>
                <div class="modal-footer">
                     
                    <a href="#!" class="btn btn-danger" data-dismiss="modal">{{get_string('close')}}</a>
                     <a href="" class="btn btn-warning" id="printLink"  target="_blank">Print</a>
                      <a href="#" class="confirm-button waves-effect btn btn-default" data-dismiss="modal">Paid</a>
                </div>
            </div>
        </div>
    </div>
    @else
        <strong class="center-align">{{get_string('no_results')}}</strong>
    @endif
</div>
<input type="hidden" class="token" value="{{ csrf_token() }}">
@endsection
@section('footer')

     
    <script>
        $(document).ready(function(){
            var confirmid;
            $("#user-modal").on('hidden.bs.modal', function () {
                $('#user-details').html('');
            });

            $('.user-info').click(function(e){
                e.preventDefault();
                var id = $(this).data('id');
                var ref = $(this).data('ref');
                confirmid = ref;
                 $("#printLink").attr("href", '{{ url('/admin/generateRefundPDF') }}/'+ ref);
                var token = $('.token').val();
                $.ajax({
                    url: '{{ url('/admin/owner/refund/details') }}/' + id, 
                    type: 'post',
                    data: {_token: token},
                    success: function (msg) {
                        $('#user-details').html(msg);
                    },
                    error: function (msg) {
                        toastr.error("error");
                    }
                });
            });


         

            $('.confirm-button').click(function(event){
                event.preventDefault();
                var id = confirmid;
                var selector = $(this).parents('tr');
                var status = $('.request-status', selector);
                var token = $('.token').val();
                if(!selector.hasClass('disabled-style')) {
                    bootbox.confirm({
                        title: '{{get_string('confirm_action')}}',
                        message: '{{get_string('upgrade_confirm')}}',
                        onEscape: true,
                        backdrop: true,
                        buttons: {
                            cancel: {
                                label: '{{get_string('no')}}',
                                className: 'btn waves-effect'
                            },
                            confirm: {
                                label: '{{get_string('yes')}}',
                                className: 'btn waves-effect'
                            }
                        },
                        callback: function (result) {
                            if (result) {
                                $.ajax({
                                    url: '{{ url('/admin/refund/completed') }}/' + id,
                                    type: 'post',
                                    data: {_token: token},
                                    success: function (msg) {
                                        selector.addClass('disabled-style');
                                        $('.request-status', selector).html('Paid');
                                        toastr.success(msg);
                                    },
                                    error: function (msg) {
                                        toastr.error(msg.responseJSON);
                                    }
                                });
                            }
                        }
                    });
                }
            });
            $('.delete-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var token = $('.token').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('delete_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/owner/refund/delete') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    selector.remove();
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });
            $('.dismiss-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var status = $('.request-status', selector);
                var token = $('.token').val();
                if(!selector.hasClass('disabled-style')){
                    bootbox.confirm({
                        title: '{{get_string('confirm_action')}}',
                        message: '{{get_string('upgrade_dismiss')}}',
                        onEscape: true,
                        backdrop: true,
                        buttons: {
                            cancel: {
                                label: '{{get_string('no')}}',
                                className: 'btn waves-effect'
                            },
                            confirm: {
                                label: '{{get_string('yes')}}',
                                className: 'btn waves-effect'
                            }
                        },
                        callback: function (result) {
                            if(result){
                                $.ajax({
                                    url: '{{ url('/admin/owner/withdrawal/dismiss/') }}/'+id,
                                    type: 'post',
                                    data: {_token :token},
                                    success:function(msg) {
                                        selector.addClass('disabled-style');
                                        status.html('{{get_string('yes')}}');
                                        toastr.success(msg);
                                    },
                                    error:function(msg){
                                        toastr.error(msg.responseJSON);
                                    }
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection