<?php
namespace phpStructs\tests\dataStructures;
use PHPUnit\Framework\TestCase;
use phpStructs\tests\AnyObject;
use phpStructs\LinkedList;
/**
 * Description of LinkedListTest
 *
 * @author Ibrahim
 */
class LinkedListTest extends TestCase{
    /**
     * @test
     */
    public function testConstructor00() {
        $list = new LinkedList();
        $this->assertEquals(-1,$list->max());
    }
    /**
     * @test
     */
    public function testConstructor01() {
        $list = new LinkedList('33');
        $this->assertEquals(-1,$list->max());
    }
    /**
     * @test
     */
    public function testConstructor02() {
        $list = new LinkedList(33);
        $this->assertEquals(33,$list->max());
    }
    /**
     * @test
     */
    public function testSize00() {
        $list = new LinkedList();
        $null = null;
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $s = 'Something';
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $number = 44;
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $another = 'Another Thing';
        $list->add($another);
        $this->assertEquals(4,$list->size());
        $more = 'More Things';
        $list->add($more);
        $this->assertEquals(5,$list->size());
        $obj = new AnyObject(5, 'Test');
        $list->add($obj);
        $this->assertEquals(6,$list->size());
        $list->removeLast();
        $this->assertEquals(5,$list->size());
        $list->remove(3);
        $this->assertEquals(4,$list->size());
        $list->remove(100);
        $this->assertEquals(4,$list->size());
        $something = 'Something';
        $list->removeElement($something);
        $this->assertEquals(3,$list->size());
        $list->removeElement($obj);
        $this->assertEquals(3,$list->size());
        $list->clear();
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testSize01() {
        $list = new LinkedList(3);
        $this->assertEquals(3,$list->max());
        $null = null;
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $s = 'Something';
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $number = 44;
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $another = 'Another Thing';
        $list->add($another);
        $this->assertEquals(3,$list->size());
        $more = 'More Things';
        $list->add($more);
        $this->assertEquals(3,$list->size());
        $obj = new AnyObject(5, 'Test');
        $list->add($obj);
        $this->assertEquals(3,$list->size());
        $list->removeLast();
        $this->assertEquals(2,$list->size());
        $list->remove(3);
        $this->assertEquals(2,$list->size());
        $list->remove(0);
        $this->assertEquals(1,$list->size());
        $something = 'Something';
        $list->removeElement($something);
        $this->assertEquals(1,$list->size());
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
        $list->add($null);
        $this->assertEquals(1,$list->size());
        $list->add($s);
        $this->assertEquals(2,$list->size());
        $list->add($number);
        $this->assertEquals(3,$list->size());
        $list->removeFirst();
        $this->assertEquals(2,$list->size());
        $list->add($null);
        $this->assertEquals(3,$list->size());
        $list->add($another);
        $this->assertEquals(3,$list->size());
        $list->add($more);
        $this->assertEquals(3,$list->size());
        $list->add($obj);
        $this->assertEquals(3,$list->size());
        $list->removeLast();
        $this->assertEquals(2,$list->size());
        $list->remove(3);
        $this->assertEquals(2,$list->size());
        $list->remove(0);
        $this->assertEquals(1,$list->size());
        $list->removeElement($something);
        $this->assertEquals(1,$list->size());
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testSize02() {
        $list = new LinkedList();
        $list->removeFirst();
        $this->assertEquals(0,$list->size());
        $list->removeLast();
        $this->assertEquals(0,$list->size());
        $list->remove(0);
        $this->assertEquals(0,$list->size());
        $list->removeElement($list);
        $this->assertEquals(0,$list->size());
    }
    /**
     * @test
     */
    public function testAdd00() {
        $list = new LinkedList(1);
        $el = 'An element.';
        $this->assertTrue($list->add($el));
        $el2 = 'Another one.';
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->removeLast();
        $this->assertTrue($list->add($el));
        $list->remove(3);
        $this->assertFalse($list->add($el2));
        $list->remove(0);
        $this->assertTrue($list->add($el2));
    }
    /**
     * @test
     */
    public function testAdd01() {
        $list = new LinkedList(7);
        for($x = 0 ; $x < $list->max() ; $x++){
            $xEl = 'El #'.$x;
            $this->assertTrue($list->add($xEl));
        }
        $el = 'An element.';
        $el2 = 'Another one.';
        $this->assertFalse($list->add($el));
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->removeLast();
        $this->assertTrue($list->add($el));
        $list->remove(3);
        $this->assertTrue($list->add($el2));
        $list->remove(0);
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
        $list->clear();
        for($x = 0 ; $x < $list->max() ; $x++){
            $xEl = 'El #'.$x;
            $this->assertTrue($list->add($xEl));
        }
        $this->assertFalse($list->add($el));
        $this->assertFalse($list->add($el2));
        $list->removeFirst();
        $this->assertTrue($list->add($el2));
        $this->assertFalse($list->add($el));
    }
    /**
     * @test
     */
    public function testRemoveFirst() {
        $list = new LinkedList();
        $this->assertNull($list->removeFirst());
        $el01 = 'Element #0';
        $el02 = 'Element #2';
        $el03 = 'Element #3';
        $el04 = 'Element #4';
        $el05 = 'Element #5';
        $list->add($el01);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        
        $list->add($el01);
        $list->add($el02);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el03,$list->removeFirst());
        $this->assertEquals($el04,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->remove(2);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el04,$list->removeFirst());
        $this->assertEquals($el05,$list->removeFirst());
        $this->assertNull($list->removeFirst());
        $list->add($el01);
        $list->add($el02);
        $list->add($el03);
        $list->add($el04);
        $list->add($el05);
        $list->removeElement($el04);
        $this->assertEquals($el01,$list->removeFirst());
        $this->assertEquals($el02,$list->removeFirst());
        $this->assertEquals($el03,$list->removeFirst());
        $this->assertEquals($el05,$list->removeFirst());
        $this->assertNull($list->removeFirst());
    }
}
