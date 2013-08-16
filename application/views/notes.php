
<div id="menu">
	<a href="/notes">All</a>
	<a class="new" href="/notes/new">New note</a>
	<!--<a class="tags" href="/notes/bookmarked">Tags</a>-->
	<div class="clear"></div>
</div>

<div style="display: block; clear: both;">

	<div id="notes">
		<? if ( ! $notes) { ?>
		<div>
			<p>It looks like you're new here.</p>
			<p>Add some notes by clicking the green 'New note' button.</p>
		</div>
		<? } ?>
		<? foreach($notes as $note) {?>
		<div>
			<span class="toolbar">
				<a href="/notes/edit/<?=$note['id']?>">edit</a>
			</span>
			<?=$note['text']?>
		</div>
		<? } ?>
	</div>

</div>
