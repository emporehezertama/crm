<script type="text/javascript">
	@if(Session::has('message-success'))
		setTimeout(function(){
          _alert("{{ Session::get('message-success') }}")
		}, 500);
    @endif
    @if(Session::has('message-error'))
		setTimeout(function(){
          _alert("{{ Session::get('message-error') }}")
      	}, 500);
    @endif
</script>