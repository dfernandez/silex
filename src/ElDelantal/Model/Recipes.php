<?php

namespace ElDelantal\Model;

class Recipes
{
    public function getLastRecipes($limit = 5)
    {
        return [
            [
                'id'           => 1,
                'title'        => 'Albóndigas con rovellones y arroz',
                'description'  => 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad.',
                'image'        => '/images/albondigas.jpg',
                'publish_date' => 'domingo, 18 de octubre de 2015',
                'publish_url'  => 'http://www.el-delantal.com/2014/04/quiche-de-espinacas-y-ricota.html',
                'slug_url'     => 'albondigas-con-rovellones-y-arroz',
            ],
        ];
    }

    public function getById($id)
    {
        return [
            'id'           => 1,
            'title'        => 'Albóndigas con rovellones y arroz',
            'description'  => 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad.',
            'image'        => '/images/albondigas.jpg',
            'publish_date' => 'domingo, 18 de octubre de 2015',
            'publish_url'  => 'http://www.el-delantal.com/2014/04/quiche-de-espinacas-y-ricota.html',
            'slug_url'     => 'albondigas-con-rovellones-y-arroz',
        ];
    }
}
