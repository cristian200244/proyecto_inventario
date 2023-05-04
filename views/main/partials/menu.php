package sena
{
	public class PreguntasRequerimientos
	{
		public var g_vector:Array;

		public function PreguntasRequerimientos( vector:Array ):void
		{
			g_vector = vector;
		}

		public function asignarPreguntasAVector():void
		{

			g_vector.push( [ ["El término sistema es exclusivo de la informática:"],
							 ["a. Verdadero."],
							 ["b. Falso."],
							 ["c. N/A."],
							 ["d. N/A."],
							 [ 2 ]
							] );

			g_vector.push( [ ["Los requerimientos funcionales describen las funciones o servicios que el sistema debe proporcionar para cumplir con los objetivos y necesidades del usuario o cliente:"],
							 ["a. Verdadero."],
							 ["b. Falso."],
							 ["c. N/A."],
							 ["d. N/A."],
							 [ 1 ]
							] );

			g_vector.push( [ ["Los requerimientos funcionales describen las funciones o servicios que el sistema debe proporcionar para cumplir con los objetivos y necesidades del usuario o cliente. Por otro lado, los requerimientos no funcionales se refieren a las propiedades o características del sistema, como el rendimiento, la escalabilidad, la disponibilidad, la seguridad, la facilidad de uso, entre otros:"],
							 ["a. Verdadero."],
							 ["b. Falso."],
							 ["c. N/A."],
							 ["d. N/A."],
							 [ 1 ]
							] );

			g_vector.push( [ ["No es un requerimiento funcional:"],
							 ["a. El sistema debe permitir comentar las publicaciones de otros usuarios."],
							 ["b. El sistema debe ser compatible en navegadores web."],
							 ["c. El sistema debe permitir crear perfiles de usuario"],
							 ["d. El sistema debe permitir buscar por medio de palabras clave."],
							 [ 2 ]
							] );

			g_vector.push( [ ["Hablando del desarrollo de un juego de ajedrez, parte de los requerimientos no funcionales sería:"],
							 ["a. El juego debe mostrar piezas que parecen de cristal."],
							 ["b. El juego debe permitir a los usuarios tomar piezas del oponente cuando se capturen."],
							 ["c. El juego debe permitir a los usuarios hacer un enroque y un peón al paso."],
							 ["d. El juego debe permitir a los usuarios verificar si un rey está en jaque y darle un jaque mate al oponente."],
							 [ 1 ]
							] );

			g_vector.push( [ ["Hablando del desarrollo de un juego de ajedrez, parte de los requerimientos no funcionales sería que:"],
							 ["a. El juego debe validar los movimientos de las piezas para asegurar que sean legales.	"],
							 ["b. El juego debe permitir a los usuarios tomar piezas del oponente cuando se capturen."],
							 ["c. El juego debe tener un tiempo de respuesta rápido para proporcionar una experiencia de usuario fluida."],
							 ["d. El juego debe permitir a los usuarios verificar si un rey está en jaque y darle un jaque mate al oponente."],
							 [ 3 ]
							] );

			g_vector.push( [ ["Hablando del desarrollo de un juego de disparos contra zombis, parte de los requerimientos no funcionales sería que:"],
							 ["a. El juego debe permitir al jugador moverse en un mundo abierto, interactuar con diferentes objetos y armas y disparar contra zombies."],
							 ["b. El juego debe permitir al jugador recolectar munición y otros elementos para sobrevivir."],
							 ["c. El juego debe permitir al jugador personalizar su personaje y su arsenal."],
							 ["d. El juego debe tener un tiempo de carga mínimo y ser capaz de manejar múltiples sesiones simultáneamente."],
							 [ 4 ]
							] );


			/*g_vector.push( [ ["Un programa en html se puede editar correctamente en:"],
							 ["a. Paint."],
							 ["b. Blog de notas."],
							 ["c. Reproductor de video de Windows."],
							 ["d. Ninguna de las anteriores."],
							 [ 2 ]
							] );*/

		}
	}
}
