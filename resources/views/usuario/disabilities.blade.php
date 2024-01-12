@extends('usuario.profile.layout')
@section('titulo', 'Mis capacidades')
@section('item-raiz', 'Perfil')
@section('item-titulo', 'Capacidades')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <form action="{{route('/usuario/saveDisabilities')}}"  method="POST">
                  @csrf
                  @foreach($tipo_discapacidad as $tipo)
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-heading{{$tipo->id}}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$tipo->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                        <h5 >{{$tipo->tipo}}</h5>
                      </button>
                      </h2>
                      <div id="flush-collapse{{$tipo->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$tipo->id}}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">                      
                            @foreach($array_preguntas[$tipo->id] as $pregunta)
                              <p>{{$pregunta['pregunta']}}</p>
                              <div class="col-sm-10 mb-2">
                                @foreach($array_respuestas[$pregunta['tipo_respuesta_id']] as $respuestas)
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="{{$pregunta['pregunta_id']}}" id="{{$pregunta['pregunta_id']}}" value="{{$respuestas['id']}}" {{$pregunta['checked'] == $respuestas['id'] ? 'checked' :''}}>
                                  <label class="form-check-label" for="1">
                                    {{$respuestas['respuesta']}}
                                  </label>
                                </div>
                                @endforeach
                              </div>
                            @endforeach
                        </div>
                      </div>
                    </div>
                  @endforeach
                  <!-- Button trigger modal -->
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Guardar cambios
                    </button>
                  </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content" >
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aceptar terminos y condiciones</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body ">
                        <div class="row">
                          <div class="col-md-12">

                            <div class="body">
                              <p><strong>Grupo Cetep</strong> busca implementar atención médica y de otros profesionales de salud mediante teleconsulta con el objetivo de facilitar la provisión de servicios a distancia desde el ámbito de la promoción, diagnóstico, prevención, tratamiento y rehabilitación, a través del uso de tecnologías de la información y comunicaciones. </p>
                              <span class="subTitleUp">
                                I.  DESCRIPCIÓN DEL SERVICIO
                              </span>

                              <p>Grupo Cetep pone a disposición de sus pacientes, la plataforma electrónica de atenciones clínicas online “Telecetep”, operada por Centro de Atención Ambulatoria, por medio del cual profesionales pertenecientes a éste, ofrecen el servicio de atención clínica a distancia vía teleconsulta, que incluye las siguientes prestaciones: </p>

                              <span class="subTitleLow">Consulta Médica de salud mental: </span>
                              <p>Los principales objetivos de la teleconsulta de salud mental son: evaluar síntomas actuales, proponer un diagnóstico y establecer un plan de tratamiento en conjunto con el paciente, mediante estrategias para la entrega de prestaciones de salud mental a distancia.</p>
                              <p>El servicio de teleconsulta no reemplaza a una consulta de urgencia de salud mental.</p>
                              <p>La teleconsulta no sustituye la atención presencial o la relación que los pacientes tengan con sus profesionales tratantes.</p>
                              <p>El equipo de profesionales se encuentra formado por psiquiatras, psicólogos, terapeutas ocupacionales, psicopedagogos y nutricionistas, con quien el paciente acepta iniciar un proceso terapéutico a distancia, cuya duración dependerá de las problemáticas señaladas por él y su gravedad.</p>
                              <p>Las sesiones de teleconsulta tendrán una duración de 30 minutos en caso de psiquiatría, psicopedagogía y nutrición, y de 45 minutos para consultas de psicología y terapia ocupacional, las que tendrán una frecuencia a determinar por el/la profesional de salud, según las necesidades del paciente.</p>
                              <p>Para garantizar la calidad y rapidez de nuestro servicio, debe tener en conocimiento lo siguiente:</p>
                              <ol>
                                <li><p>En caso de pesquisar durante el tratamiento algún trastorno psiquiátrico de mayor severidad, que requiera de una intervención diferente, el paciente será informado y será derivado a otro profesional de la salud que lo atienda de manera presencial.</p></li>
                                <li><p>Se solicita puntualidad en las citas. El atraso en una sesión supondría que otras personas se viesen afectadas o que el paciente tenga menor tiempo para su atención.</p></li>
                                <li><p>Se requiere cumplir con las indicaciones en la regularidad de atenciones según plan de trabajo desarrollado entre el profesional y el paciente..</p></li>
                                <li><p>El Centro Médico se reserva la decisión de interrupción de la intervención en caso de verificarse lo señalado en el punto 1, o bien se incumplen lo indicado en los puntos 2 o 3.</p></li>
                                <li><p>La entrega de recetas retenidas será materializada de manera diferida, para lo cual se darán indicaciones al momento de la consulta.</p></li>
                              </ol>
                              <span class="subTitleLow">Consulta Médica electiva y otras especialidades médicas: </span>
                              <p>En este caso, la teleconsulta será prestada por un médico u otro profesional de la salud, enfocado en la atención y orientaciones en salud. En esta modalidad, el profesional asiste al paciente mediante una video llamada, consiguiendo a través de esta plataforma, los antecedentes clínicos requeridos para dar curso a la atención. La teleconsulta tiene ciertas limitaciones, como el no poder realizar examen físico completo y hasta el momento no poder emitir documentos como la licencia médica. Otros documentos, como recetas comunes, certificados médicos, notificación Ges, entre otros pueden ser enviados de manera digital por el profesional.</p>
                              <p>El servicio excluye atenciones de Urgencia o Emergencia médica. Nuestra recomendación es que ante una emergencia o urgencia médica debe acudir inmediatamente a un establecimiento de salud que pueda otorgar la prestación requerida.</p>
                              <p>La teleconsulta no reemplaza o sustituye la atención presencial o la relación con su médico y/o equipo de salud.</p>
                              <p>La teleconsulta podría generar derivaciones a urgencia o consultas presenciales.  </p>
                              <p>Los pacientes atendidos por teleconsulta son los responsables de seguir con las recomendaciones clínicas.</p>

                              <span class="subTitleLow">• Receta Médica:</span>
                              <p>En caso de que el criterio médico lo permita, al finalizar la atención, el paciente recibirá de parte del médico una receta médica simple digitalizada para que pueda adquirir los medicamentos que requiera para el tratamiento indicado por el médico</p>
                              <p>Se excluye de lo señalado, la emisión de recetas retenidas y recetas cheque</p>

                              <span class="subTitleLow">• Certificados Médicos y licencias médicas: </span>
                              <p>El médico podrá entregar al paciente certificados de atención médica, válido como justificativo para ser presentado en la Institución correspondiente. También podrá entregar certificados de derivaciones médicas.</p>
                              <p>Se excluye la emisión de licencias médicas digitales a distancia.</p>

                              <span class="subTitleLow">• Órdenes de examen: </span>
                              <p>El médico podrá emitir órdenes de examen, que permitan verificar, identificar o descartar un determinado diagnóstico.</p>

                              <span class="subTitleLow">• Notificaciones GES: </span>
                              <p>Se pueden realizar notificaciones GES a distancia, enviando documento digitalizado a Isapre.</p>

                              <span class="subTitleLow">Exclusiones:</span>
                              <p>La atención clínica online no incluye toda otra actividad clínica no mencionada previamente.</p>

                              <span class="subTitleUp">II.  PROCEDIMIENTO PARA SOLICITAR ATENCIÓN POR TELECETEP: </span>
                              <ol>
                                <li><p>El paciente debe ingresar a http://telecetep.cl/.</p></li>
                                <li><p>Deberá seleccionar el profesional o especialidad, y luego día y hora para la Teleconsulta, según disponibilidad que encuentre en ese momento.</p></li>
                                <li><p>Una vez confirmada la reserva se deberá ejecutar el pago siguiendo los pasos que se dispondrán para ello</p></li>
                                <li><p>Una vez finalizada la etapa de ingreso y pago de la atención requerida, el profesional atenderá la consulta a través de una video llamada, y en el caso correspondiente, enviará a su correo electrónico recetas médicas, ordenes de exámenes, certificados médicos, entre otros, todo ello, en el plazo acordado con el profesional.</p></li>
                                <li><p>La reserva de horas de teleconsulta estará disponible en la plataforma Telecetep, pero la oferta disponible será restringida a la agenda que los profesionales tengan disponible para este servicio.</p></li>
                                <li><p>En caso de que la persona que requiera atención sea un menor de 18 años o por su condición de salud requiera actuar debidamente representado, deberá estar acompañado de una persona mayor de edad a cuyo cuidado se encuentre de su representante legal durante toda la atención clínica. No obstante lo anterior, para Salud Mental se requiere un apoderado y en lo posible una atención en conjunto con el menor de edad. Igualmente por motivos clínicos y de vínculo, podría excluirse la presencia del apoderado en algunas sesiones. </p></li>
                                <li><p>Para asegurar la calidad de la video llamada y una buena experiencia de atención del paciente, éste debe estar conectado a una conexión estable de internet. Se recomienda usar una conexión a una red WiFi, o también red móvil 4G. La velocidad mínima de conexión es de 400 kbps. Si el paciente no cumple con las condiciones mínimas que requiera el tratante, o bien pierda la conexión o esta se interrumpa, será de responsabilidad de su responsabilidad y no se podrá realizar la teleasistencia.</p></li>
                                <li><p>Reagedamiento: El paciente o su apoderado si fuere el caso, podrá solicitar el reagendamiento de su hora de teleconsulta hasta 15 minutos antes de la atención, en caso de no presentarse a la cita virtual sin haber dado aviso previo o reagendado en los plazos señalados, no se procederá a la devolución del dinero.</p></li>
                                <li><p>9. Anulación: El paciente o su apoderado si fuere el caso, podrá solicitar anular su hora hasta 15 minutos antes de la atención de teleconsulta, el que tendrá el derecho a la siguiente devolución. Si el paciente o su apoderado solicita anular la cita antes de 48 horas se devolverá el 100% del arancel pagado, en caso de solicitar anulación luego de las 48 horas, pero antes de 15 minutos de la atención se realizará una devolución del 70% de lo pagado. No se aceptarán anulaciones hechas con una antelación menor a los 15 minutos antes del comienzo de atención de teleconsulta.</p></li>
                              </ol>

                              <span class="subTitleUp">III. VALOR DEL SERVICIO DE TELECONSULTA</span>
                              <p>El valor del servicio de atención clínica online deberá ser entregado antes de recibir la atención, pudiendo utilizar las opciones de pago que estarán disponibles una vez realizado el agendamiento de la consulta. Las formas de pago podrán ser, pero no se limitarán a: webpay y otras tecnologías de pago virtual.</p>
                              <p>La cobertura de teleconsulta depende de la especialidad, de acuerdo con las normativas vigentes. Grupo Cetep se reserva el derecho de modificar los precios de teleconsulta cuando estime pertinente.</p>

                              <span class="subTitleUp">IV. REGISTRO Y SEGURIDAD </span>
                              <p>Con el fin de acceder al sitio y al servicio de teleconsulta, usted garantiza que tiene al menos dieciocho años y que posee el derecho legal y la capacidad, en nombre propio o de un menor de edad del cual usted es su representante legal, de acuerdo con las presentes Condiciones de Uso.</p>
                              <p>Regístrese para acceder al servicio de atención clínica online bajo su propio nombre y use este servicio de conformidad con las Condiciones de Uso y cumpla con las obligaciones del presente documento. Usted acepta plenamente, con exactitud y veracidad crear su reserva de cita clínica online con datos verdaderos y fidedignos, incluyendo su nombre completo, dirección, ciudad, comuna, correo, fecha de nacimiento, número de teléfono fijo o móvil, correo electrónico y cualquier otro dato que sea requerido para la correcta cita clínica.</p>
                              <p>Usted se compromete a prohibir cualquier otro uso de su identificación en el sitio y se compromete a notificar inmediatamente a Grupo Cetep de cualquier irregularidad, uso no autorizado o mal uso de esta o de cualquier problema de seguridad, que usted detecte en el uso de su identificación en este sitio.</p>
                              <p>Con el fin de determinar el cumplimiento de estas condiciones de uso, nos reservamos el derecho, pero no la obligación, de controlar el acceso y el uso del sitio y del servicio de atención clínica online y a no proporcionar la atención por el mal uso real o potencial de este servicio, o por el incumplimiento de los términos y condiciones de uso del sitio y de este servicio.</p>

                              <span class="subTitleUp">V. PREVENCIÓN DE FRAUDE Y SEGURIDAD </span>
                              <p>Grupo Cetep puede ponerse en contacto con usted por teléfono o correo electrónico para verificar la información de la cita creada y usted se compromete a facilitar dicha información para asegurarse de que no haya creado fraudulentamente su cita clínica. en caso de no proporcionarse la información solicitada dentro de 48 horas, Grupo Cetep –y por su seguridad- se reserva el derecho de suspender, interrumpir o negar el acceso y uso del sitio y el servicio, hasta que la información sea proporcionada.</p>
                              <p>El profesional a cargo de su atención podría solicitarle al principio de esta verificar su identidad mediante su cedula de identidad nacional.</p>
                              <p>Grupo Cetep no solicita datos personales o bancarios por teléfono o mail, solo información relacionada con su atención médica.</p>

                              <span class="subTitleUp">VI. ANTECEDENTES PERSONALES DE LOS PACIENTES </span>
                              <p>Los datos personales de los usuarios recibidos y almacenados por Grupo Cetep con ocasión de este servicio, son confidenciales y serán usados y/o tratados en conformidad a las disposiciones legales sobre el tema, especialmente lo dispuesto por la Ley N.º 19.628 Sobre Protección de Datos de Carácter Personal, y la Ley N.º 20.584 que Regula los Derechos y Deberes que tienen las Personas en relación con Acciones Vinculadas a su Atención de Salud.</p>
                              <p>Los datos personales y sensibles que el paciente proporcione para acceder a este servicio y durante el otorgamiento de las prestaciones que requiera en el contexto de la atención clínica online, son verdaderos, y es en ellos donde se fundamenta la atención que recibe por parte de los profesionales médicos de Grupo Cetep, obligándose el paciente o su representante a mantener actualizada dicha información.</p>
                              <p>Toda información, declaración falsa u omisión por parte del paciente o su representante en cuanto a lo anterior, habilitará a Grupo Cetep a cancelar la cita de teleconsulta.</p>

                              <span class="subTitleUp">VII. RESERVA DE DERECHOS </span>
                              <p>Grupo Cetep se reserva el derecho de no otorgar el servicio de atención médica online por mal uso real o potencial de este servicio, ni en caso de fuerza mayor o caso fortuito, catástrofe u ocurrencia en el momento de solicitar la atención de algún acto terrorista u otro similar.</p>
                              <p>Grupo Cetep no se responsabiliza de los errores y omisiones propias del paciente o representante legal, o por el hecho o causa fortuita, por actos u omisiones de terceros.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </section>
    <style>
      .modal-dialog{
          overflow-y: initial;
      }

      .modal-body{
          max-height: 70vh;
          overflow-y: auto;
      }
    </style>
@endsection