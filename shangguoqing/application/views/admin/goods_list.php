<form id="pagerForm" method="post" action="/admin/goods/index">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $page_size?>" />
	
</form>


<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="/admin/goods" method="post">
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					商品名称：<input type="text" name="keyword" />
				</td>
				<td>
				<?php echo form_dropdown('cat_id',$cat_list, 0,'class="combox"')?>
				</td>
				<td>
					建档日期：<input name="create_time" type="text" class="date" readonly="true" />
				</td>
			</tr>
		</table>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
				<li><a class="button" href="demo_page6.html" target="dialog" mask="true" title="查询框"><span>高级检索</span></a></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/admin/goods/add" target="navTab" rel="edit"><span>添加</span></a></li>
			<li><a class="delete" href="/admin/goods/del/{sid_user}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/admin/goods/edit/{sid_user}" target="navTab"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="10%">编号</th>
				<th width="20%">名称</th>
				<th width="10%">分类</th>
				<th width="10%">价格</th>
				<th width="10%">创建日期</th>
				<th width="20%">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $v):?>
			<tr target="sid_user" rel="<?php echo $v['id']?>">
				<td><?php echo $v['id']?></td>
				<td><?php echo $v['goods_name']?></td>
				<td><?php echo $v['cat_name']?></td>
				<td><?php echo $v['goods_price']?></td>
				<td><?php echo $v['create_time']?></td>
				<td><?php echo anchor('/admin/goods/edit/'.$v['id'],'编辑','target="navTab" rel="edit"')?></td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共<?php echo $total?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo $total?>" numPerPage="<?php echo $page_size?>" pageNumShown="10" currentPage="<?php echo $cur_page?>"></div>

	</div>
</div>
