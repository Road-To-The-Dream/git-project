<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 21:25
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;

class CommentValidationTest extends TestCase
{
    private $obj;
    private $class;

    protected function setUp()
    {
        $this->obj = new CommentValidation();

        $this->class = new \ReflectionClass(CommentValidation::class);
    }

    public function testValidateTextComment()
    {
        $this->assertEquals($this->obj->validateTextComment('Hello!'), '["\u0414\u043b\u044f \u0434\u043e\u0431\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u043a\u043e\u043c\u043c\u0435\u043d\u0442\u0430\u0440\u0438\u044f \u0442\u0440\u0435\u0431\u0443\u0435\u0442\u0441\u044f \u0432\u043e\u0439\u0442\u0438 \u0432 \u0430\u043a\u043a\u0430\u0443\u043d\u0442!","error"]');
    }

    public function testCleanTextCommentAndAddingComment()
    {
        $method = $this->class->getMethod('cleanTextCommentAndAddingComment');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj);
        $this->assertEquals(true, $result);
    }

    public function testCleanFields()
    {
        $method = $this->class->getMethod('cleanField');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, "<a href='test'>Test</a>");
        $this->assertEquals("Test", $result);
    }
}
