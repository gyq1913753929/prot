<table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="150">
      <col width="200">
      <col>
    </colgroup>
    <!-- <thead>
      <tr>
        <th>品牌ID</th>
        <th>品牌名称</th>
        <th>品牌LOGO</th>
        <th>品牌网址</th>
        <th>品牌介绍</th>
        <th>操作</th>
      </tr> 
    </thead> -->






<tbody>
    @foreach($data as $v)
      <tr>
        <td><span><input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->id}}"></span></td>
        <td>{{$v->id}}</td>
        <td>{{$v->brand_name}}</td>
        <td>
          @if($v->brand_logo)
            <img src="{{$v->brand_logo}}" with="120">
          @endif
        </td>
        <td>{{$v->brand_url}}</td>
        <td>{{$v->brand_desc}}</td>
        <td>
          <a href="{{url('admin/brand/edit/'.$v->id)}}" class="layui-btn layui-btn-normal">编辑</a>
  <!-- php 普通删除        <a href="javascript:void()" onclick="if(confirm('确认删除此纪录')){location.href='{{url('admin/brand/destroy/'.$v->id)}}'; }" class="layui-btn layui-btn-normal">删除</a> -->
          <a href="javascript:void(0);" onclick="deleteById({{$v->id}},this)" class="layui-btn layui-btn-normal">删除</a>
        </td>
      </tr>
    
    @endforeach
  
    <div>
      <tr>
        <td colspan="6">
        {{$data->links('vendor.pagination.admin')}}
        </td>
      </tr>
   </div>
</div>

</tbody>
</table>