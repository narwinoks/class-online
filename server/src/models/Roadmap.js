module.exports = (sequelize, DataTypes) => {
  const Roadmap = sequelize.define(
    "Roadmap",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      logo: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "roadmaps",
      timestamps: true,
    }
  );
  return Roadmap;
};
