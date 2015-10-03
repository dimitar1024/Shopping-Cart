<?php

namespace Controllers;


use GF\BaseController;
use GF\Normalizer;
use Models\Input\ReviewBindingModel;

class ReviewController extends BaseController
{

    /**
     * @Post
     * @Authorize
     * @Route("Review/add/{id:int}")
     */
    public function add(ReviewBindingModel $model)
    {
        $message = Normalizer::normalize($model->getMessage(), 'noescape|trim');
        $productId = $this->input->get(2);
        $this->db->prepare("SELECT id
                            FROM users
                            WHERE id = ? AND username = ?",
            array($this->session->_login, $this->session->_username));
        $response = $this->db->execute()->fetchRowAssoc();
        $id = $response['id'];
        if ($id) {
            $this->db->prepare("SELECT name
                            FROM products
                            WHERE id = ?",
                array($productId));
            $response = $this->db->execute()->fetchRowAssoc();
            if (!$response) {
                throw new \Exception("No product with this id!", 404);
            }

            $this->db->prepare("INSERT
                            INTO reviews
                            (message, userId, productId)
                            VALUES (?, ?, ?)",
                array($message, $id, $productId)
            )->execute();
        }

        $this->redirect("/product/$productId/show");
    }

    /**
     * @Put
     * @Route("review/{id:int}/edit")
     * @Role("Moderator")
     * @param ReviewBindingModel $model
     */
    public function edit(ReviewBindingModel $model)
    {
        $id = $this->input->get(1);
        $this->db->prepare("SELECT productId
                            FROM reviews
                            WHERE id = ?",
            array($id));
        $response = $this->db->execute()->fetchRowAssoc();
        $productId = Normalizer::normalize($response['productId'], 'noescape|int');

        $this->db->prepare("UPDATE reviews
                            SET message = ?
                            WHERE id = ?",
            array($model->getMessage(), $id))->execute();

        $this->redirect("/product/$productId/show");
    }

    /**
     * @Delete
     * @Route("review/{id:int}/delete")
     * @Role("Moderator")
     */
    public function remove()
    {
        $id = $this->input->get(1);
        $this->db->prepare("SELECT productId
                            FROM reviews
                            WHERE id = ?",
            array($id));
        $response = $this->db->execute()->fetchRowAssoc();
        $productId = Normalizer::normalize($response['productId'], 'noescape|int');

        $this->db->prepare("DELETE FROM reviews
                            WHERE id = ?",
            array($id))->execute();

        $this->redirect("/product/$productId/show");
    }
}