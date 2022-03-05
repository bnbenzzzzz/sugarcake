<?php
include("./connect/connectdb.php");
$promotionItem = array();
$sqlQueryPromotion = "SELECT * FROM promotion INNER JOIN promotion_detail ON promotion.promotion_id = promotion_detail.promotion_id WHERE promotion.promotion_status != 0";
$resultPromotion = mysqli_query($conn, $sqlQueryPromotion);
while ($row = mysqli_fetch_assoc($resultPromotion)) {
    $relation_promotionHasProduct = array();
    $promotionItem[$row['promotion_id']] = $row;
    $promotionID = $row['promotion_id'];
    $sqlPromotionDetail = "SELECT * FROM promotion_detail JOIN product ON promotion_detail.pd_id = product.pd_id WHERE promotion_detail.promotion_id = $promotionID";
    $promotionItem[$row['promotion_id']]["promotionHasProduct"] = [];
    $queryPromotionDetail = mysqli_query($conn, $sqlPromotionDetail);
    while ($rowPromotionDetail = mysqli_fetch_assoc($queryPromotionDetail)) {
        array_push($promotionItem[$row['promotion_id']]["promotionHasProduct"], $rowPromotionDetail);
    }
}

echo json_encode([$promotionItem], JSON_UNESCAPED_UNICODE, JSON_PRETTY_PRINT);
