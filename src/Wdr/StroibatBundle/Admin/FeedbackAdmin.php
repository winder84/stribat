<?php
/**
 * Created by PhpStorm.
 * User: ibragimovrt
 * Date: 12.12.13
 * Time: 15:40
 */

namespace Wdr\StroibatBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FeedbackAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Имя клиента'))
            ->add('description', 'text', array('label' => 'Отзыв'))
            ->add('file', 'file', array(
		        'required' => false,
	        ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('description')
        ;
    }


}