@foreach($chars as $char)
                    <div class="character-list">
                        <div class="character-infos">
                            
                            <div class="img" style="background-image: url('img/artwork.png')">
                                
                            </div>
                            <div class="body-char">
                                <h4 class="header">[{{$char->vocation}}] Level {{$char->level}} - {{$char->world_type}}</h4>
                                <div style="color:#666;font-size:0.9em;">
                                    <ul>
                                        @if($char->hide_name == 1)
                                        <li class="char_name"><img src="/img/char-icon.png">{{$char->name}}</li>
                                        @endif
                                        @if($char->hide_world == 1)
                                        <li class="world"><i class="fas fa-globe-americas"></i> {{$char->world}}</li>
                                        @endif
                                        @if($char->mage_hat == 1)
                                        <li class="magehat" style="color:red;"><img src="/img/hat-icon.png" alt="Mage Hat"> Mage Hat </li>
                                        @endif
                                        @if($char->neon_sparkid_mount == 1)
                                        <li class="neonsparkid" style="color:red;"><img src="/img/neon_sparkid-icon.png" alt="Neon Sparkid Mount"> Neon Sparkid Mount </li>
                                        @endif
                                        @if($char->elementalist_addon_2 == 1)
                                        <li class="elementalist2"><img src="/img/elemental-icon.png" lt="Elemental Spikes Addon"> Elementalist Addon 2 </li>
                                        @endif                                        
                                        <li><i class="fas fa-exchange-alt"></i> {{$char->transfer}}</li>
                                        <?php 
                                        switch ($char->vocation) {
                                            case 'Royal Paladin':
                                              $skill = 'Distance: '.$char->distance_fight;
                                            break;
                                             case 'Paladin':
                                              $skill = 'Distance: '.$char->distance_fight;
                                            break;
                                             case 'Elite Knight':
                                              $rankSkill = [
                                                  'Sword' => $char->sword_fight,
                                                  'Axe' => $char->axe_fight,
                                                  'Club' => $char->club_fight
                                                  ];
                                            $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                                            $key = array_search($maxSkill, $rankSkill);
                                            $skill = $key.'&nbsp;'.$maxSkill;
                                            break;
                                             case 'Knight':
                                              $rankSkill = [
                                                  'Sword' => $char->sword_fight,
                                                  'Axe' => $char->axe_fight,
                                                  'Club' => $char->club_fight
                                                  ];
                                            $maxSkill = max(array($char->sword_fight, $char->axe_fight, $char->club_fight));
                                            $key = array_search($maxSkill, $rankSkill);
                                            $skill = $key.'&nbsp;'.$maxSkill;
                                            break;                                          
                                          default:
                                            $skill = 'Magic Level: '.$char->magiclevel;
                                            break;
                                        }
                                        ?>
                                        <li> <i class="fas fa-bolt"></i> {{$skill}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price">
                                <small>Preço</small>
                                <span class="value">R$ {{$char->price}}</span>
                                {{-- <small>U$ 450</small> --}}<br>
                                
                                <div class="next-button">
                                    <button type="button" class="btnred">Eu quero!</button>
                                </div>
                                
                                <div class="footer">
                                    <small>Anunciado por</small>
                                    <span>{!! usernick($char->user_id) !!}</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach