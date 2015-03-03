function countCharbannertext(val,id,count)
  {
     var len = val.value.length;
          if (len >= count) {
            val.value = val.value.substring(0, count);
          } else {
            $('#'+id).text ("Remaining Characters  " + (count - len));
          }
  } 