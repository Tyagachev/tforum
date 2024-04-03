<div>
   @foreach($commentsSuspectArray as $commentSuspect)
       @foreach($commentSuspect as $commentSuspectItem)
            <div class="d-flex text-body-secondary pt-3">
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark">{{ $commentSuspectItem->uid }}</strong>
                    <strong class="d-block text-gray-dark">{{ $commentSuspectItem->name }}</strong>
                    {{ $commentSuspectItem->text }}
                </p>
            </div>
       @endforeach
   @endforeach
</div>
