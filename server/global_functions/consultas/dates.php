<?php

function CurrentDate()
{
    date_default_timezone_set("America/Caracas");
    
    $fecha = date('Y-m-d');

    return $fecha;
}

function CurrentTime()
{
    date_default_timezone_set("America/Caracas");

    $fecha = date('Y-m-d H:i:s');

    return $fecha;
}

function CurrentDay()
{
    date_default_timezone_set("America/Caracas");

    $fecha = date('l');
    $dia = TransformDay($fecha);

    return $dia;
}

function CurrentHour()
{
    date_default_timezone_set("America/Caracas");

    $hora =  date("H:i:s A");

    return $hora;
}

function DateFormat($fecha)
{
   $date =  date("d/m/Y", strtotime($fecha));

   return $date;
}

function DateHour($fecha)
{
   $date =  date("H:i:s A", strtotime($fecha));

   return $date;
}

function DateDay($fecha)
{
   $date =  date("l", strtotime($fecha));
   $day = TransformDay($date);

   return $day;
}

function TransformDay($day)
{
    switch ($day)
    {
    case "Sunday":
           return "domingo";
    break;
    case "Monday":
           return "lunes";
    break;
    case "Tuesday":
           return "martes";
    break;
    case "Wednesday":
           return "miércoles";
    break;
    case "Thursday":
           return "jueves";
    break;
    case "Friday":
           return "viernes";
    break;
    case "Saturday":
           return "sábado";
    break;
}
}

function TimeDifference($date_1, $date_2, $indice)
{
   $date_1 = new DateTime($date_1);
   $date_2 = new DateTime($date_2);

   $intervalo = $date_1->diff($date_2);
   $horas = $intervalo->h;
   $minutos = $intervalo->i;
   $segundos = $intervalo->s;
   $dias = $intervalo->d;
   $meses = $intervalo->m;
   $years = $intervalo->y;

   if($indice === 'hora')
   {
       return $horas;
   }
   if($indice === 'minutos')
   {
      if($minutos === 0)
      {
        $minutos = 'Justo Ahora';
      }
      if($minutos > 1 && $minutos <60)
      {
        $respuesta = "Hace $minutos minutos";
        return $respuesta;
      }
      if($minutos > 60)
      {
        $minutos = "Hace $horas horas";
      }

       return $minutos;
   }
   if($indice === 'segundos')
   {
       return $segundos;
   }
   if($indice === 'dias')
   {
       return $dias;
   }
   if($meses === 'meses')
   {
       return $meses;
   }
   if($indice === 'years')
   {
       return $years;
   }
}