@include('partials.header')
<x-navbar :user="$user"/>
<x-otherUser_info :user="$user"/>
@include('partials.footer')