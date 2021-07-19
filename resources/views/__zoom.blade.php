
    {{-- include_once 'Zoom_Api.php';
    $zoom_meeting = new Zoom_Api();
    $data = array();
    $data['topic'] 		= 'Example Test Meeting';
    $data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
    $data['duration'] 	= 30;
    $data['type'] 		= 2;
    $data['password'] 	= "";
    try {
        $response = $zoom_meeting->createMeeting($data);
        ($response); --}}

{{-- ------------------------------------------------------------------------------------ --}}

@if (auth()->user()->user_role() == 'admin')
<form  method="POST" action="{{route('zoom.store')}}" class="text-right"> 
    @csrf
    {{-- <input type="hidden" name="zoom_url" value="{{$response->join_url}}"> --}}
    <input class="btn btn-primary rounded-0 text-center py-2 d-block w-full" type="submit" value="Create Zoom Metting">
</form>
@else
@if(isset($zoom_link))
<a type="button" class="btn btn-success rounded-0 text-center py-2 d-block" href="{{$zoom_link->link}}">join Meeting</a>                           
@endif  
@endif


{{-- ------------------------------------------------------------------------------------ --}}
{{-- 
} catch (Exception $ex) {
    echo $ex;
} --}}

