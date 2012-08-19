<?php 
if (!function_exists('leanpencil_meta_box_add')) {
	function leanpencil_meta_box_add() {
			$mrt_leanpencil_pts=get_post_types('','names'); 
			$leanpencil_options = get_option('leanpencil_options');
			$leanpencil_mrt_cpt = $leanpencil_options['leanpenci_enablecpost'];
			foreach ($mrt_leanpencil_pts as $mrt_leanpencil_pt) {
				if($mrt_leanpencil_pt == 'post' || $mrt_leanpencil_pt == 'page' || $leanpencil_mrt_cpt){
					add_meta_box('leanpencil',__('All in One SEO Pack', 'all_in_one_seo_pack'),'aiosp_meta',$mrt_leanpencil_pt);
				}
			}
	}
}

?>