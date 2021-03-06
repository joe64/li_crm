<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * @copyright   Liplex Webprogrammierung und -design Christian Kolb 2011
 * @author      Christian Kolb <info@liplex.de>
 * @author      ApoY2k <apoy2k@gmail.com>
 * @license     MIT (see /LICENSE.txt for further information)
 */

/**
 * Class ProductType
 */
class ProductType extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->import('Database');
    }
    
    public function getLabel($row)
    {
        $image = file_exists($row['icon']) ? $row['icon'] : 'system/modules/li_crm/icons/products.png';
        
        return '<img src="'.$image.'" alt="'.$row['title'].'" /> '.$row['title'];
    }
}
