{"filter":false,"title":"ManageArtista.php","tooltip":"/clases/ManageArtista.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":106,"column":21},"end":{"row":106,"column":22},"action":"remove","lines":["U"],"id":743}],[{"start":{"row":106,"column":21},"end":{"row":106,"column":22},"action":"insert","lines":["A"],"id":744}],[{"start":{"row":106,"column":22},"end":{"row":106,"column":23},"action":"insert","lines":["r"],"id":745}],[{"start":{"row":106,"column":23},"end":{"row":106,"column":24},"action":"insert","lines":["t"],"id":746}],[{"start":{"row":106,"column":24},"end":{"row":106,"column":25},"action":"insert","lines":["i"],"id":747}],[{"start":{"row":106,"column":25},"end":{"row":106,"column":26},"action":"insert","lines":["s"],"id":748}],[{"start":{"row":106,"column":26},"end":{"row":106,"column":27},"action":"insert","lines":["t"],"id":749}],[{"start":{"row":106,"column":27},"end":{"row":106,"column":28},"action":"insert","lines":["a"],"id":750}],[{"start":{"row":106,"column":36},"end":{"row":106,"column":37},"action":"remove","lines":["o"],"id":751}],[{"start":{"row":106,"column":35},"end":{"row":106,"column":36},"action":"remove","lines":["i"],"id":752}],[{"start":{"row":106,"column":34},"end":{"row":106,"column":35},"action":"remove","lines":["r"],"id":753}],[{"start":{"row":106,"column":33},"end":{"row":106,"column":34},"action":"remove","lines":["a"],"id":754}],[{"start":{"row":106,"column":32},"end":{"row":106,"column":33},"action":"remove","lines":["u"],"id":755}],[{"start":{"row":106,"column":31},"end":{"row":106,"column":32},"action":"remove","lines":["s"],"id":756}],[{"start":{"row":106,"column":30},"end":{"row":106,"column":31},"action":"remove","lines":["u"],"id":757}],[{"start":{"row":106,"column":30},"end":{"row":106,"column":31},"action":"insert","lines":["a"],"id":758}],[{"start":{"row":106,"column":31},"end":{"row":106,"column":32},"action":"insert","lines":["r"],"id":759}],[{"start":{"row":106,"column":32},"end":{"row":106,"column":33},"action":"insert","lines":["t"],"id":760}],[{"start":{"row":106,"column":33},"end":{"row":106,"column":34},"action":"insert","lines":["i"],"id":761}],[{"start":{"row":106,"column":34},"end":{"row":106,"column":35},"action":"insert","lines":["s"],"id":762}],[{"start":{"row":106,"column":35},"end":{"row":106,"column":36},"action":"insert","lines":["t"],"id":763}],[{"start":{"row":106,"column":36},"end":{"row":106,"column":37},"action":"insert","lines":["a"],"id":764}],[{"start":{"row":108,"column":8},"end":{"row":114,"column":59},"action":"remove","lines":["$parametrosSet['email'] = $usuario->getEmail();","        $parametrosSet['clave'] = $usuario->getClave();","        $parametrosSet['alias']=$usuario->getAlias();","        $parametrosSet['fechaAlta']=$usuario->getFechaAlta();","        $parametrosSet['activo']=$usuario->getActivo();","        $parametrosSet['administrador']=$usuario->getAdministrador();","        $parametrosSet['personal']=$usuario->getPersonal();"],"id":765},{"start":{"row":108,"column":8},"end":{"row":111,"column":61},"action":"insert","lines":["$parametrosSet['email'] = $artista->getEmail();","        $parametrosSet['clave'] = $artista->getClave();","        $parametrosSet['alias']=$artista->getAlias();","        $parametrosSet['plantilla']=$artista->getPlantilla();"]}],[{"start":{"row":106,"column":4},"end":{"row":106,"column":5},"action":"remove","lines":[" "],"id":766}],[{"start":{"row":113,"column":5},"end":{"row":114,"column":0},"action":"insert","lines":["",""],"id":767},{"start":{"row":114,"column":0},"end":{"row":114,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":114,"column":4},"end":{"row":132,"column":5},"action":"insert","lines":["        function getValuesSelect($proyeccion,$orden){","        $this->bd->query($this->tabla, $proyeccion, array(), $orden);","        $array = array();","        while($fila=$this->bd->getRow()){","            $array[$fila[0]] = $fila[0];","        }","        return $array;","    }","    ","    function getValuesSelect2($proyeccion,$orden){","        $this->bd->query($this->tabla, $proyeccion, array(), $orden);","        $array = array();","        $i=0;","        while($fila=$this->bd->getRow()){","            $array[$i] = $fila[0];","            $i++;","        }","        return $array;","    }"],"id":768}],[{"start":{"row":114,"column":8},"end":{"row":114,"column":12},"action":"remove","lines":["    "],"id":769}],[{"start":{"row":114,"column":4},"end":{"row":114,"column":8},"action":"remove","lines":["    "],"id":770}],[{"start":{"row":132,"column":5},"end":{"row":133,"column":0},"action":"insert","lines":["",""],"id":771},{"start":{"row":133,"column":0},"end":{"row":133,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":133,"column":4},"end":{"row":146,"column":5},"action":"insert","lines":["function count($condicion=\"1 = 1\", $parametros = array()){","        return $this->bd->count($this->tabla, $condicion, $parametros);","    }","        function getList2($pagina=1, $nrpp=Constant::NRPP){","         $registroInicial = ($pagina-1)*$nrpp;","         $this->bd->select($this->tabla, \"*\", \"1=1\", array(), \"email, alias\", \"$registroInicial, $nrpp\");","         $r=array();","         while($fila =$this->bd->getRow()){","             $usuario = new Usuario();","             $usuario->set($fila);","             $r[]=$usuario;","         }","         return $r;","    }"],"id":772}],[{"start":{"row":136,"column":4},"end":{"row":136,"column":8},"action":"remove","lines":["    "],"id":773}],[{"start":{"row":141,"column":20},"end":{"row":141,"column":21},"action":"remove","lines":["o"],"id":774}],[{"start":{"row":141,"column":19},"end":{"row":141,"column":20},"action":"remove","lines":["i"],"id":775}],[{"start":{"row":141,"column":18},"end":{"row":141,"column":19},"action":"remove","lines":["r"],"id":776}],[{"start":{"row":141,"column":17},"end":{"row":141,"column":18},"action":"remove","lines":["a"],"id":777}],[{"start":{"row":141,"column":16},"end":{"row":141,"column":17},"action":"remove","lines":["u"],"id":778}],[{"start":{"row":141,"column":15},"end":{"row":141,"column":16},"action":"remove","lines":["s"],"id":779}],[{"start":{"row":141,"column":14},"end":{"row":141,"column":15},"action":"remove","lines":["u"],"id":780}],[{"start":{"row":141,"column":14},"end":{"row":141,"column":15},"action":"insert","lines":["a"],"id":781}],[{"start":{"row":141,"column":15},"end":{"row":141,"column":16},"action":"insert","lines":["r"],"id":782}],[{"start":{"row":141,"column":16},"end":{"row":141,"column":17},"action":"insert","lines":["t"],"id":783}],[{"start":{"row":141,"column":17},"end":{"row":141,"column":18},"action":"insert","lines":["i"],"id":784}],[{"start":{"row":141,"column":18},"end":{"row":141,"column":19},"action":"insert","lines":["s"],"id":785}],[{"start":{"row":141,"column":19},"end":{"row":141,"column":20},"action":"insert","lines":["t"],"id":786}],[{"start":{"row":141,"column":20},"end":{"row":141,"column":21},"action":"insert","lines":["a"],"id":787}],[{"start":{"row":141,"column":34},"end":{"row":141,"column":35},"action":"remove","lines":["o"],"id":788}],[{"start":{"row":141,"column":33},"end":{"row":141,"column":34},"action":"remove","lines":["i"],"id":789}],[{"start":{"row":141,"column":32},"end":{"row":141,"column":33},"action":"remove","lines":["r"],"id":790}],[{"start":{"row":141,"column":31},"end":{"row":141,"column":32},"action":"remove","lines":["a"],"id":791}],[{"start":{"row":141,"column":30},"end":{"row":141,"column":31},"action":"remove","lines":["u"],"id":792}],[{"start":{"row":141,"column":29},"end":{"row":141,"column":30},"action":"remove","lines":["s"],"id":793}],[{"start":{"row":141,"column":28},"end":{"row":141,"column":29},"action":"remove","lines":["U"],"id":794}],[{"start":{"row":141,"column":28},"end":{"row":141,"column":29},"action":"insert","lines":["A"],"id":795}],[{"start":{"row":141,"column":29},"end":{"row":141,"column":30},"action":"insert","lines":["r"],"id":796}],[{"start":{"row":141,"column":30},"end":{"row":141,"column":31},"action":"insert","lines":["t"],"id":797}],[{"start":{"row":141,"column":31},"end":{"row":141,"column":32},"action":"insert","lines":["i"],"id":798}],[{"start":{"row":141,"column":32},"end":{"row":141,"column":33},"action":"insert","lines":["s"],"id":799}],[{"start":{"row":141,"column":33},"end":{"row":141,"column":34},"action":"insert","lines":["t"],"id":800}],[{"start":{"row":141,"column":34},"end":{"row":141,"column":35},"action":"insert","lines":["a"],"id":801}],[{"start":{"row":142,"column":20},"end":{"row":142,"column":21},"action":"remove","lines":["o"],"id":802}],[{"start":{"row":142,"column":19},"end":{"row":142,"column":20},"action":"remove","lines":["i"],"id":803}],[{"start":{"row":142,"column":18},"end":{"row":142,"column":19},"action":"remove","lines":["r"],"id":804}],[{"start":{"row":142,"column":17},"end":{"row":142,"column":18},"action":"remove","lines":["a"],"id":805}],[{"start":{"row":142,"column":16},"end":{"row":142,"column":17},"action":"remove","lines":["u"],"id":806}],[{"start":{"row":142,"column":15},"end":{"row":142,"column":16},"action":"remove","lines":["s"],"id":807}],[{"start":{"row":142,"column":14},"end":{"row":142,"column":15},"action":"remove","lines":["u"],"id":808}],[{"start":{"row":142,"column":14},"end":{"row":142,"column":15},"action":"insert","lines":["a"],"id":809}],[{"start":{"row":142,"column":15},"end":{"row":142,"column":16},"action":"insert","lines":["r"],"id":810}],[{"start":{"row":142,"column":16},"end":{"row":142,"column":17},"action":"insert","lines":["t"],"id":811}],[{"start":{"row":142,"column":17},"end":{"row":142,"column":18},"action":"insert","lines":["i"],"id":812}],[{"start":{"row":142,"column":18},"end":{"row":142,"column":19},"action":"insert","lines":["s"],"id":813}],[{"start":{"row":142,"column":19},"end":{"row":142,"column":20},"action":"insert","lines":["t"],"id":814}],[{"start":{"row":142,"column":20},"end":{"row":142,"column":21},"action":"insert","lines":["a"],"id":815}],[{"start":{"row":143,"column":25},"end":{"row":143,"column":26},"action":"remove","lines":["o"],"id":816}],[{"start":{"row":143,"column":24},"end":{"row":143,"column":25},"action":"remove","lines":["i"],"id":817}],[{"start":{"row":143,"column":23},"end":{"row":143,"column":24},"action":"remove","lines":["r"],"id":818}],[{"start":{"row":143,"column":22},"end":{"row":143,"column":23},"action":"remove","lines":["a"],"id":819}],[{"start":{"row":143,"column":21},"end":{"row":143,"column":22},"action":"remove","lines":["u"],"id":820}],[{"start":{"row":143,"column":20},"end":{"row":143,"column":21},"action":"remove","lines":["s"],"id":821}],[{"start":{"row":143,"column":19},"end":{"row":143,"column":20},"action":"remove","lines":["u"],"id":822}],[{"start":{"row":143,"column":19},"end":{"row":143,"column":20},"action":"insert","lines":["a"],"id":823}],[{"start":{"row":143,"column":20},"end":{"row":143,"column":21},"action":"insert","lines":["r"],"id":824}],[{"start":{"row":143,"column":21},"end":{"row":143,"column":22},"action":"insert","lines":["t"],"id":825}],[{"start":{"row":143,"column":22},"end":{"row":143,"column":23},"action":"insert","lines":["i"],"id":826}],[{"start":{"row":143,"column":23},"end":{"row":143,"column":24},"action":"insert","lines":["s"],"id":827}],[{"start":{"row":143,"column":24},"end":{"row":143,"column":25},"action":"insert","lines":["t"],"id":828}],[{"start":{"row":143,"column":25},"end":{"row":143,"column":26},"action":"insert","lines":["a"],"id":829}],[{"start":{"row":91,"column":61},"end":{"row":92,"column":0},"action":"insert","lines":["",""],"id":830},{"start":{"row":92,"column":0},"end":{"row":92,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":92,"column":8},"end":{"row":92,"column":53},"action":"insert","lines":["$parametrosSet['alias']=$artista->getAlias();"],"id":831}],[{"start":{"row":92,"column":25},"end":{"row":92,"column":29},"action":"remove","lines":["lias"],"id":832},{"start":{"row":92,"column":25},"end":{"row":92,"column":26},"action":"insert","lines":["c"]}],[{"start":{"row":92,"column":26},"end":{"row":92,"column":27},"action":"insert","lines":["t"],"id":833}],[{"start":{"row":92,"column":27},"end":{"row":92,"column":28},"action":"insert","lines":["i"],"id":834}],[{"start":{"row":92,"column":24},"end":{"row":92,"column":28},"action":"remove","lines":["acti"],"id":835},{"start":{"row":92,"column":24},"end":{"row":92,"column":30},"action":"insert","lines":["activo"]}],[{"start":{"row":92,"column":47},"end":{"row":92,"column":51},"action":"remove","lines":["lias"],"id":836},{"start":{"row":92,"column":47},"end":{"row":92,"column":48},"action":"insert","lines":["c"]}],[{"start":{"row":92,"column":48},"end":{"row":92,"column":49},"action":"insert","lines":["t"],"id":837}],[{"start":{"row":92,"column":49},"end":{"row":92,"column":50},"action":"insert","lines":["i"],"id":838}],[{"start":{"row":92,"column":43},"end":{"row":92,"column":50},"action":"remove","lines":["getActi"],"id":839},{"start":{"row":92,"column":43},"end":{"row":92,"column":52},"action":"insert","lines":["getActivo"]}],[{"start":{"row":102,"column":61},"end":{"row":103,"column":0},"action":"insert","lines":["",""],"id":840},{"start":{"row":103,"column":0},"end":{"row":103,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":103,"column":8},"end":{"row":103,"column":55},"action":"insert","lines":["$parametrosSet['activo']=$artista->getActivo();"],"id":841}],[{"start":{"row":113,"column":61},"end":{"row":114,"column":0},"action":"insert","lines":["",""],"id":842},{"start":{"row":114,"column":0},"end":{"row":114,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":114,"column":8},"end":{"row":114,"column":55},"action":"insert","lines":["$parametrosSet['activo']=$artista->getActivo();"],"id":843}]]},"ace":{"folds":[],"scrolltop":1676,"scrollleft":0,"selection":{"start":{"row":114,"column":55},"end":{"row":114,"column":55},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1454240317028,"hash":"1c2e2c3080f34a442e99e1c5071bb702ab4bb559"}