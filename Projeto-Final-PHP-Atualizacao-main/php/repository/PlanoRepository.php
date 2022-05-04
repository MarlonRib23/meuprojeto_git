<?php
class PlanoRepository
{
    private $conn;

    public function __construct() {

        $connection = new Connection();
        $this->conn = $connection->getConnection();
    }

    function fnAddPlano($plano): bool
    {
        try {

            $query = "INSERT INTO plano (tipo, preco, info1, info2, info3, info4, info5, info6, info7, info8, categoria_id) ";
            $query .= "values (:ptipo, :ppreco, :pinfo1, :pinfo2, :pinfo3, :pinfo4, :pinfo5, :pinfo6, :pinfo7, :pinfo8, :pcategoriaId)";
            $query .= " on conflict do nothing";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":ptipo", $plano->getTipo());
            $stmt->bindValue(":ppreco", $plano->getPreco());
            $stmt->bindValue(":pinfo1", $plano->getInfo1());
            $stmt->bindValue(":pinfo2", $plano->getInfo2());
            $stmt->bindValue(":pinfo3", $plano->getInfo3());
            $stmt->bindValue(":pinfo4", $plano->getInfo4());
            $stmt->bindValue(":pinfo5", $plano->getInfo5());
            $stmt->bindValue(":pinfo6", $plano->getInfo6());
            $stmt->bindValue(":pinfo7", $plano->getInfo7());
            $stmt->bindValue(":pinfo8", $plano->getInfo8());
            $stmt->bindValue(":pcategoriaId", $plano->getCategoriaId());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o preco no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    function fnUpdatePlano($plano): bool
    {
        try {

            $query = "UPDATE plano SET tipo = :ptipo, preco = :ppreco, info1 = :pinfo1,  info2 = :pinfo2,  info3 = :pinfo3,  info4 = :pinfo4,  info5 = :pinfo5,  info6 = :pinfo6, info7 = :pinfo7, info8 = :pinfo8, categoria_id = :pcategoriaId WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(":pid", $plano->getId());
            $stmt->bindValue(":ptipo", $plano->getTipo());
            $stmt->bindValue(":ppreco", $plano->getPreco());
            $stmt->bindValue(":pinfo1", $plano->getInfo1());
            $stmt->bindValue(":pinfo2", $plano->getInfo2());
            $stmt->bindValue(":pinfo3", $plano->getInfo3());
            $stmt->bindValue(":pinfo4", $plano->getInfo4());
            $stmt->bindValue(":pinfo5", $plano->getInfo5());
            $stmt->bindValue(":pinfo6", $plano->getInfo6());
            $stmt->bindValue(":pinfo7", $plano->getInfo7());
            $stmt->bindValue(":pinfo8", $plano->getInfo8());
            $stmt->bindValue(":pcategoriaId", $plano->getCategoriaId());

            if ($stmt->execute())
                return true;

            return false;
        } catch (PDOException $error) {
            echo "Erro ao inserir o servico no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
    
    public function fnListPlano($limit = 9999) {
        try {

            $query = "SELECT id, tipo, preco, info1, info2, info3, info4, info5, info6, info7, info8, categoria_id categoriaId, criado_em criadoEm from plano order by criado_em desc limit :plimit";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':plimit', $limit);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Plano');
                return  $stmt->fetchAll();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os planos no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnLocalizarPlano($id) {
        try {

            $query = "SELECT id, tipo, preco, info1, info2, info3, info4, info5, info6, info7, info8, categoria_id categoriaId, criado_em criadoEm FROM plano WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Plano');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao listar os planos no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }

    public function fnDeletarPlano($id) {
        try {

            $query = "DELETE FROM plano WHERE id = :pid";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':pid', $id);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Plano');
                return  $stmt->fetch();
            }

            return false;
        } catch (PDOException $error) {
            echo "Erro ao deletar o Plano no banco. Erro: {$error->getMessage()}";
            return false;
        } finally {
            unset($this->conn);
            unset($stmt);
        }
    }
}
