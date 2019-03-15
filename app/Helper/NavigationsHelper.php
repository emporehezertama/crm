<?php

/**
 * Permalink
 * @return object
 */
function get_page($permalink)
{
	return \App\Models\Navigations::where('permalink', $permalink)->first();
}

/**
 * Get Product Category
 * @return object
 */
function navigations()
{
	return \App\Models\Navigations::all();
}

/**
 * Navigation tree object
 * @return object
 */
function navigation_tree_object()
{
	$object = [];

	foreach(navigations() as $key => $item)
	{
		if($item->parent_navigation_id != 0) continue;

		$sub_menu = get_sub_menu($item->id);

		$object[$key] = $item;

	  	if(count($sub_menu) > 0)
	  	{
	  		$object[$key]['sub_menu']  = navigation_sub_menu_tree_object($sub_menu, [], []);	
	  	}
	}

	return $object;
}

/**
 * Navigation Sub Menu Tree
 * @return object
 */
function navigation_sub_menu_tree_object($object, $data)
{
	foreach($object as $key => $item)
	{
	  	$sub_menu = get_sub_menu($item->id);
	  	
	  	$data[$key] = $item;

	  	if(count($sub_menu) > 0)
	  	{
	  		$data[$key]['sub_menu'] = navigation_sub_menu_tree_object($sub_menu, []);	
	  	}
	}

	return $data;
}

/**
 * Get Parent Navigations
 * @return object
 */
function get_parent($parent_id, $type = 'title')
{
	if($parent_id == null || $parent_id == "") return "";

	$parent =  \App\Models\Navigations::where('id',$parent_id);

	if($parent)
	{
		if($type=='title')
		{
			return $parent->first()->title;
		}
		if($type=='all')
		{
			return $parent->get();
		}
	}
	else
	{
		return "";
	}
}

/**
 * get sub menu
 * @return object / objects
 */
function get_sub_menu($id)
{
	if(empty($id) || $id == 0) return 0;

	return \App\Models\Navigations::where('parent_navigation_id',$id)->get();
}

/**
 * Select Navigation Form
 * @return string
 */
function navigation_select_form($id=null)
{
	$html = "";

	foreach(navigations() as $item)
	{
		if($item->parent_navigation_id != 0) continue;

		$sub_menu = get_sub_menu($item->id);

		$html  .=' <option '. ($id == $item->id  ? 'selected' : '') .' value="'. $item->id .'">'. $item->title .'</option>';

	  	if(count($sub_menu) > 0)
	  	{
	  		$space  = "&nbsp; --";
	  		$html  .= navigation_select_form_sub_menu($sub_menu, "", $space, $id);	
	  	}
	}
	
	return $html;
}

/**
 * Navigation Sub Menu
 * @return html
 */
function navigation_select_form_sub_menu($object, $html, $space, $id=null)
{
	foreach($object as $item)
	{
	  	$sub_menu = get_sub_menu($item->id);
	  	
	  	$html .=' <option '. ($id == $item->id  ? 'selected' : '') .' value="'. $item->id .'">'. $space . ' '. $item->title .'</option>';

	  	if(count($sub_menu) > 0)
	  	{
	  		$html  .= navigation_select_form_sub_menu($sub_menu, '', $space .'--');	
	  	}
	}

	return $html;
}

/**
 * Navigation Array
 * @return object
 */
function navigations_array($id=null)
{
	$data = [];
	$no = 1;

	foreach(navigations() as $item)
	{
		if($item->parent_navigation_id != 0) continue;

		$sub_menu = get_sub_menu($item->id);

		$item->no 		= $no;
		$data[]  		= $item;

	  	if(count($sub_menu) > 0)
	  	{
	  		$space  = '&nbsp'. $no .". ";
	  		$d  = navigations_array_sub_menu($sub_menu, [], $space, $id);	
	  		foreach($d as $i)
	  		{
	  			$data[] = $i;
	  		}
	  	}
	  	$no++;
	}
	
	return $data;
}

/**
 * Navigation Array Sub Menu
 * @return object
 */
function navigations_array_sub_menu($object, $data, $space, $id=null)
{	
	$no= 1;
	foreach($object as $item)
	{
	  	$sub_menu 	= get_sub_menu($item->id);
		$item->no 	= $space.$no;
	  	$data[] 	= $item;

	  	if(count($sub_menu) > 0)
	  	{
	  		$space  = '&nbsp'. $space .$no .". ";
	  		$d  = navigations_array_sub_menu($sub_menu, [], $space, $id);	
	  		foreach($d as $i)
	  		{
	  			$data[] = $i;
	  		}	
	  	}

		$no++;
	}

	return $data;
}
