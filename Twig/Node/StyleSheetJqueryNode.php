<?php
/**
 * This file is part of the <Tool> project.
 *
 * @subpackage   Jquery
 * @package    Extension
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 * @since 2012-01-18
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Sfynx\ToolBundle\Twig\Node;

/**
 * StyleSheetJquery Node.
 *
 * @subpackage   Jquery
 * @package    Extension
 * @author Etienne de Longeaux <etienne.delongeaux@gmail.com>
 */
class StyleSheetJqueryNode extends \Twig_Node
{
    /**
     * @var string $extensionName
     */
    protected $extensionName;
        
    /**
     * @param     \Twig_NodeInterface     $value
     * @param     integer                             $lineno
     * @param     string                                 $tag (optional)
     * @return     void
     */
    public function __construct($extensionName, \Twig_Node $value, $lineno, $tag = null)
    {
        $this->extensionName = $extensionName;
        
        parent::__construct(['value' => $value], [], $lineno, $tag);
    }

    /**
     * @param \Twig_Compiler $compiler
     * @return void
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler->addDebugInfo($this);
        
        $compiler
            ->write(sprintf("echo \$this->env->getExtension('%s')->initJquery(", $this->extensionName))
            ->subcompile($this->getNode('value'))
            ->raw(");\n");
    }
}
