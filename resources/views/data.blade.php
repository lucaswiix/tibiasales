@foreach($chars as $char)
<div class="character-list">
                        <div class="character-infos">
                            
                            <div class="img">
                                
                            </div>
                            <div class="body-char">
                                <h4 class="header">[ED] Level {{$char->level}} - {{$char->world_type}}</h4>
                                <div class="text">
                                    <ul>
                                        <li>Mage Hat</li>
                                        <li>Mage Hat</li>
                                        <li>Mage Hat</li>
                                        <li>Mage Hat</li>
                                        <li>Mage Hat</li>
                                        <li>Mage Hat</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price">
                                <small>Preço</small>
                                <span class="value">R$ {{$char->price}}</span>
                                <small>U$ 450</small>
                                
                                <div class="next-button">
                                    <button type="button" class="btnred">Eu quero!</button>
                                </div>
                                
                                <div class="footer">
                                    <small>Anunciado por</small>
                                    <span>{{$char->user_id}}</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
@endforeach