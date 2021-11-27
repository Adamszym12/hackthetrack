<?php //
//Programming AlgorithmsHomeCategories About
//Search...
//
//Kruskal's Algorithm
//Kruskal's algorithm is a minimum-spanning-tree algorithm which finds an edge of the least possible weight that connects any two trees in the forest. It is a greedy algorithm in graph theory as it finds a minimum spanning tree for a connected weighted graph adding increasing cost arcs at each step. This means it finds a subset of the edges that forms a tree that includes every vertex, where the total weight of all the edges in the tree is minimized. If the graph is not connected, then it finds a minimum spanning forest (a minimum spanning tree for each connected component).
//
//
//
//
//
//C#
//VB.Net
//C
//C++
//PHP
//
//class Edge
//{
//public $Source;
//public $Destination;
//public $Weight;
//}
//
//class Graph
//{
//public $VerticesCount;
//public $EdgesCount;
//public $_edge = array();
//}
//
//class Subset
//{
//public $Parent;
//public $Rank;
//}
//
//function CreateGraph($verticesCount, $edgesCoun)
//{
//$graph = new Graph();
//$graph->VerticesCount = $verticesCount;
//$graph->EdgesCount = $edgesCoun;
//$graph->_edge = array();
//
//for ($i = 0; $i < $graph->EdgesCount; ++$i)
//$graph->_edge[$i] = new Edge();
//
//return $graph;
//}
//
//function Find($subsets, $i)
//{
//if ($subsets[$i]->Parent != $i)
//$subsets[$i]->Parent = Find($subsets, $subsets[$i]->Parent);
//
//return $subsets[$i]->Parent;
//}
//
//function Union($subsets, $x, $y)
//{
//$xroot = Find($subsets, $x);
//$yroot = Find($subsets, $y);
//
//if ($subsets[$xroot]->Rank < $subsets[$yroot]->Rank)
//$subsets[$xroot]->Parent = $yroot;
//else if ($subsets[$xroot]->Rank > $subsets[$yroot]->Rank)
//$subsets[$yroot]->Parent = $xroot;
//else
//{
//$subsets[$yroot]->Parent = $xroot;
//++$subsets[$xroot]->Rank;
//}
//}
//
//function CompareEdges($a, $b)
//{
//return $a->Weight > $b->Weight;
//}
//
//function PrintResult($result, $e)
//{
//for ($i = 0; $i < $e; ++$i)
//echo $result[$i]->Source . " -- " . $result[$i]->Destination . " == " . $result[$i]->Weight . "<br/>";
//}
//
//function Kruskal($graph)
//{
//$verticesCount = $graph->VerticesCount;
//$result = array();
//$i = 0;
//$e = 0;
//
//usort($graph->_edge, "CompareEdges");
//
//$subsets = array();
//
//for ($v = 0; $v < $verticesCount; ++$v)
//{
//$subsets[$v] = new Subset();
//$subsets[$v]->Parent = $v;
//$subsets[$v]->Rank = 0;
//}
//
//while ($e < $verticesCount - 1)
//{
//$nextEdge = $graph->_edge[$i++];
//$x = Find($subsets, $nextEdge->Source);
//$y = Find($subsets, $nextEdge->Destination);
//
//if ($x != $y)
//{
//$result[$e++] = $nextEdge;
//Union($subsets, $x, $y);
//}
//}
//
//PrintResult($result, $e);
//}
//
//
//
//
//Example
//
//$verticesCount = 4;
//$edgesCount = 5;
//$graph = CreateGraph($verticesCount, $edgesCount);
//
//// Edge 0-1
//$graph->_edge[0]->Source = 0;
//$graph->_edge[0]->Destination = 1;
//$graph->_edge[0]->Weight = 10;
//
//// Edge 0-2
//$graph->_edge[1]->Source = 0;
//$graph->_edge[1]->Destination = 2;
//$graph->_edge[1]->Weight = 6;
//
//// Edge 0-3
//$graph->_edge[2]->Source = 0;
//$graph->_edge[2]->Destination = 3;
//$graph->_edge[2]->Weight = 5;
//
//// Edge 1-3
//$graph->_edge[3]->Source = 1;
//$graph->_edge[3]->Destination = 3;
//$graph->_edge[3]->Weight = 15;
//
//// Edge 2-3
//$graph->_edge[4]->Source = 2;
//$graph->_edge[4]->Destination = 3;
//$graph->_edge[4]->Weight = 4;
//
//Kruskal($graph);
//
//
//
//
//Output
//
//2 -- 3 == 4
//0 -- 3 == 5
//0 -- 1 == 10
//
//
//Recently Submitted Algorithms
//XOR Encryption
//Breadth First Traversal
//Depth First Traversal
//Linear Search
//Interpolation Search
//
//
//Related Algorithms
//Bellman–Ford Algorithm
//Dijkstra's Algorithm
//Breadth First Traversal
//Floyd–Warshall Algorithm
//Prim's Algorithm
//
//
//© 2015 - 2021 Programming Algorithms. All Rights Reserved.Home About Us FAQs Terms Of Use Privacy Policy
