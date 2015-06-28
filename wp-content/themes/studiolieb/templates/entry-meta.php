<time <?php if (get_the_modified_time('c') != get_the_time('c'))
{
	echo ' class="updated" datetime="' . get_the_modified_time('c') . '"';
}
else
{
	echo ' class="published" datetime="' . get_the_date('c') . '"';
}?>><?php echo get_the_date(); ?></time>