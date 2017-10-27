@extends('layouts.master')
@section('title')
    分配权限
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>分配权限</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">分配权限</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">

                        <div class="content">
                            @foreach($list as $item)
                            <table class="no-border">
                                <thead class="no-border">
                                <tr>
                                    <th  colspan="4"><div class="col-sm-12">

                                            <div class="radio">
                                                <label class="checkbox-inline"> <input type="checkbox" name="parent" class="icheck" value="{{$item->id}}" @if(in_array($item->id,$parent_id)) checked @endif><sapn style="font-weight: 600"> {{$item->p_name}}</sapn></label>
                                            </div></div></th>
                                </tr>
                                </thead>
                                <tbody class="no-border-x no-border-y">
                                <tr>

                                    <td>
                                        <div class="form-group">
                                        <div class="col-sm-12">

                                            <div class="radio">
                                                @foreach($item->sonlist as $v)
                                                <label class="checkbox-inline"> <input type="checkbox" name="son" class="icheck" value="{{$v->id}}" @if(in_array($v->id,$son_id)) checked @endif> {{$v->p_name}}</label>
                                                @endforeach
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            @endforeach




                        </div>
                        <div class="radio"><button type="button" class="btn btn-primary btn-rad pull-right" id="save" data-id="{{$id}}">保存</button></div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    {{--<button class="btn btn-primary btn-flat md-trigger" data-modal="md-scale"> Fade in &amp; Scale</button>--}}

@endsection
@section('javascript')
    <script>

        $('#save').click(function(){
            var parent_id = new Array();
            var son_id = new Array();
            var id = $(this).attr('data-id');
            $("input[name='parent']:checked").each(function(key){
                parent_id[key] = $(this).val();
            })
            $("input[name='son']:checked").each(function(key){
                son_id[key] = $(this).val();
            })
            console.log(parent_id);
            console.log(son_id);
            $.post('{{url('/admin/saveaccess')}}',{parent:parent_id,son:son_id,id:id,_token:"{{csrf_token()}}"},function(data){
                if(data.flag){
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                }else{
                    alertfail(data.msg);
                }
            },'json')

        })






    </script>
@endsection