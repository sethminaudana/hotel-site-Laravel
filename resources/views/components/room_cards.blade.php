 @if($rooms->isEmpty())
    <div class="col-12 text-warning text-center">⚠️ No rooms match your search.</div>
@else

 @foreach ($rooms as $room)
                  <div class="col-xxl-4 col-xl-6 col-lg-6">
                     <div class="bd-room mb-30">
                        <div class="bd-room__content" >
                            <div class="room-cards" data-room-id="{{ $room->id }}" style="cursor: pointer;">
                           <h4 class="bd-room__title mb-20"><a href="{{route('room.show', $room->id)}}">{{$room->room_name}}</a></h4>
                           <div class="bd-room__price mb-30">
                              <p>{{$room->price}} <span>/NIGHT</span></p>
                           </div>
                           <div class="bd-room__thumb-wrap mb-30">
                              <div class="bd-room__thumb">
                                @php
                                    $imagePath = public_path($room->image_path);
                                    $imageUrl = file_exists($imagePath)
                                        ? asset($room->image_path)
                                        : asset('img/roombg.jpg');
                                @endphp
                                 <img src="{{$imageUrl}}" alt="room image">
                              </div>
                              <div class="bd-room__details">
                                 <p>{{$room->description}}</p>
                                 <div class="bd-room__list">
                                    {{-- @foreach ($room->features as $feature)
                                       <div class="bd-room__list-item">
                                          <i class="{{$feature->icon_class}}"></i>
                                          <p>{{$feature->feature_name}}</p>
                                       </div>
                                    @endforeach --}}
                                 </div>
                              </div>
                           </div>
                           <div class="bd-room__btn">
                              <a href="{{route('room.show', $room->id)}}"><span>View room</span> <i
                                    class="fa-regular fa-arrow-right-long"></i></a>
                           </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
@endif
