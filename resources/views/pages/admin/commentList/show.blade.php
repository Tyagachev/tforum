<div>
   @foreach($commentsSuspectArray as $commentSuspect)
       @foreach($commentSuspect as $commentSuspectItem)
            <p>{{ $commentSuspectItem->uid }}</p>
            <p>{{ $commentSuspectItem->name }}</p>
           <p>{{ $commentSuspectItem->text }}</p>
       @endforeach
   @endforeach
</div>
